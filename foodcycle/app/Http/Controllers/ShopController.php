<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;


class ShopController extends Controller
{
    public function index(Request $request)
    {
        // Fetch only approved products
        $query = Product::where('status', 'approved');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        // Sorting functionality
        if ($request->has('sort') && in_array($request->sort, ['low-high', 'high-low'])) {
            $query->orderBy('price', $request->sort === 'low-high' ? 'asc' : 'desc');
        }

        // Apply filters based on the request
        if ($request->has('filter')) {
            $filters = $request->input('filter');

            if (in_array('human', $filters)) {
                $query->where('category', 'human');
            }

            if (in_array('animal', $filters)) {
                $query->where('category', 'animal');
            }

            if (in_array('fertilizer', $filters)) {
                $query->where('category', 'fertilizer');
            }
        }

        // Get the results
        $products = $query->get()->map(function ($product) {
            // Calculate remaining time for flash sales
            $expiryDateTime = Carbon::parse($product->created_at)->addHours($product->expiry_hours);
            $remainingHours = Carbon::now()->diffInHours($expiryDateTime, false);

            // Check if product is in flash sales (remaining time less than 5 hours)
            if ($remainingHours > 0 && $remainingHours < 5 && $product->stock > 0) {
                $product->is_flash_sale = true;
                $product->flash_sale_price = $product->price * 0.7; // Apply 30% discount
            } else {
                $product->is_flash_sale = false;
            }

            return $product;
        });

        // Pass data to the view
        return view('shop', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Calculate flash sale status
        $expiryDateTime = Carbon::parse($product->created_at)->addHours($product->expiry_hours);
        $remainingHours = Carbon::now()->diffInHours($expiryDateTime, false);

        if ($remainingHours > 0 && $remainingHours < 5 && $product->stock > 0) {
            $product->is_flash_sale = true;
            $product->flash_sale_price = $product->price * 0.7; // Apply 30% discount
        } else {
            $product->is_flash_sale = false;
        }

        return view('product.show', compact('product'));
    }

   public function addToCart(Request $request, $productId)
    {
        // Make sure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        // Find the product
        $product = Product::findOrFail($productId);

        // Get the quantity from the form submission
        $quantity = $request->input('quantity', 1);

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Optional: Deduct from the stock (depending on your business logic)
        $product->decrement('stock', $quantity);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

}

