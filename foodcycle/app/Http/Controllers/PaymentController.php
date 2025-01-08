<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;
use App\Models\PaymentItem; // Ensure this is imported
use App\Models\Cart;
use App\Mail\PaymentSuccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cartItems = Cart::where('user_id', auth()->id())
                         ->with('product')
                         ->get();

        $productTotal = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        $shippingPrice = 100.00;
        $finalTotal = $productTotal + $shippingPrice;

        return view('checkout', compact('cartItems', 'productTotal', 'shippingPrice', 'finalTotal'));
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            $charge = Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'LKR',
                'source' => $request->stripeToken,
                'description' => 'Order Payment',
            ]);
    
            $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->address = $request->address;
            $payment->city = $request->city;
            $payment->phone = $request->phone;
            $payment->postal_code = $request->postal_code;
            $payment->payment_method = 'stripe';
            $payment->payment_status = 'completed';
            $payment->save();
    
            if ($request->has('cartItems')) {
                foreach ($request->cartItems as $item) {
                    Log::info('Processing cart item', $item); // Add this line to log cart items
                    PaymentItem::create([
                        'payment_id' => $payment->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }
    
            // Clear the user's cart
            Cart::where('user_id', Auth::id())->delete();
    
            // Calculate the final total
            $finalTotal = $request->amount;
    
            // Send payment success email
            Mail::to($payment->email)->send(new PaymentSuccess($payment, $finalTotal));
    
            // Redirect to order confirmation page with finalTotal
            return redirect()->route('order.confirmation', ['payment' => $payment->id, 'finalTotal' => $finalTotal]);
        } catch (\Exception $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function orderConfirmation($paymentId, $finalTotal)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('order_confirmation', compact('payment', 'finalTotal'));
    }
}