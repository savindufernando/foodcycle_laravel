<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    // Display the cart page
    public function index()
    {
        // Fetch cart items for the logged-in user and eager load the associated product
        $cartItems = Cart::where('user_id', auth()->id())
                         ->with('product')  // Eager load product details
                         ->get();

        return view('cart', compact('cartItems')); // Pass cart items to the view
    }

    // Remove an item from the cart
    public function remove($cartId)
    {
        // Find the cart item based on ID and ensure it's for the logged-in user
        $cartItem = Cart::where('id', $cartId)
                        ->where('user_id', auth()->id())
                        ->firstOrFail(); // If not found, throw a 404

        // Delete the cart item
        $cartItem->delete();

        // Redirect back to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Item removed from the cart successfully.');
    }

    // Display the checkout page
    public function checkout()
    {
        // Fetch cart items for the logged-in user
        $cartItems = Cart::where('user_id', auth()->id())
                         ->with('product')  // Eager load product details
                         ->get();
    
        // Calculate product total
        $productTotal = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });
    
        // Define the fixed shipping price
        $shippingPrice = 100.00; // Fixed shipping price
    
        // Calculate the final total
        $finalTotal = $productTotal + $shippingPrice;
    
        return view('checkout', compact('cartItems', 'productTotal', 'shippingPrice', 'finalTotal'));
    }

}
