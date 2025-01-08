<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetching products with 'pending' status
        $products = Product::with('admin')->where('status', 'pending')->get();
        return view('teacher.dashboard', compact('products'));
    }

    // Approve a product
    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Product approved successfully!');
    }

    // Reject a product (updated from delete to reject)
    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Product rejected successfully!');
    }

    // Delete a product (if needed, can be kept or removed)
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
