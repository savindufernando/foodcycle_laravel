<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('admin_id', auth('admin')->id())->get();
        return view('admin.viewproduct', compact('products'));
    }

    public function create()
    {
        return view('admin.addproduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:human,animal,fertilizer',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'expiry_hours' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'expiry_hours' => $request->expiry_hours,
            'description' => $request->description,
            'image' => $path,
            'status' => 'pending',
            'admin_id' => auth('admin')->id(),
            'moved_at' => now(),
        ]);

        return redirect()->route('admin.addproduct')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        return view('admin.editproduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:human,animal,fertilizer',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'expiry_hours' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'category', 'price', 'stock', 'expiry_hours', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        $product->status = 'pending';
        $product->save();

        return redirect()->route('admin.viewproduct')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.viewproduct')->with('success', 'Product deleted successfully!');
    }

    public function flashSales()
    {
        $flashSales = Product::where('expiry_hours', '<', 5)
                             ->where('stock', '>', 0)
                             ->where('status', '!=', 'expired')
                             ->get()
                             ->map(function ($product) {
                                 $expiryDateTime = Carbon::parse($product->created_at)->addHours($product->expiry_hours);
                                 $remainingHours = Carbon::now()->diffInHours($expiryDateTime, false);
                                 $remainingMinutes = Carbon::now()->diffInMinutes($expiryDateTime) % 60;
                                 if ($remainingHours > 0 || $remainingMinutes > 0) {
                                     $product->flash_sale_price = $product->price * 0.7; // Apply 30% discount
                                     $product->remaining_hours = $remainingHours;
                                     $product->remaining_minutes = $remainingMinutes;
                                 } else {
                                     $product->status = 'expired';
                                     $product->save();
                                 }
                                 return $product;
                             });

        return $flashSales;
    }

    public function expiredProducts()
    {
        $expiredProducts = Product::where('admin_id', auth('admin')->id())
                                   ->where('status', 'expired')
                                   ->get();

        return view('admin.expiredproducts', compact('expiredProducts'));
    }
}
