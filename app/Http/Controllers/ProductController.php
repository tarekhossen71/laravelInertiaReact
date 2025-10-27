<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    use UploadAble;

    public function index(Request $request)
    {
        Gate::authorize('app.product.index');

        $query = Product::orderBy('id', 'desc');

        if ($request->filled('search_text')) {
            $query->where('name', 'LIKE', "%{$request->search_text}%");
        }

        $products = $query->paginate(10)->through(fn($p) => [
            'id' => $p->id,
            'name' => $p->name,
            'sku' => $p->sku,
            'price' => $p->price,
            'status' => $p->status,
            'main_image' => $p->main_image ? asset('uploads/products/'.$p->main_image) : '',
            'created_at' => $p->created_at->format('Y-m-d'),
        ]);

        return Inertia::render('Products/Index', [
            'products' => $products,
            'filters' => $request->only('search_text'),
            'pageTitle' => 'Products',
        ]);
    }

    public function create()
    {
        Gate::authorize('app.product.create');
        return Inertia::render('Products/Create', [
            'pageTitle' => 'Product Create',
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('app.product.create');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'nullable|string|max:100|unique:products,sku',
            'status' => 'required|in:active,inactive',
            'seo_title' => 'nullable|string',
            'seo_meta_tags' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'main_image' => 'nullable|image',
            'gallery_images.*' => 'nullable|image',
        ]);

        $slug = Str::slug($validated['name']);
        $main_image = null;
        $gallery = [];

        if ($request->hasFile('main_image')) {
            $main_image = $this->upload_file($request->main_image, 'products/');
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $gallery[] = $this->upload_file($file, 'products/');
            }
        }

        Product::create(array_merge($validated, [
            'slug' => $slug,
            'main_image' => $main_image,
            'gallery_images' => $gallery,
            'created_by' => auth()->user()->name ?? 'system',
        ]));

        return redirect()->route('app.product.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('app.product.edit');

        $product = Product::findOrFail($id);
        return Inertia::render('Products/Edit', [
            'product' => $product,
            'pageTitle' => 'Product Edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('app.product.edit');

        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'nullable|string|max:100|unique:products,sku,'.$id,
            'status' => 'required|in:Active,Inactive',
            'seo_title' => 'nullable|string',
            'seo_meta_tags' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'main_image' => 'nullable|image',
            'gallery_images.*' => 'nullable|image',
        ]);

        $main_image = $product->main_image;
        $gallery = $product->gallery_images ?? [];

        if ($request->hasFile('main_image')) {
            $this->delete_file($product->main_image, 'products/');
            $main_image = $this->upload_file($request->main_image, 'products/');
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $gallery[] = $this->upload_file($file, 'products/');
            }
        }

        $product->update(array_merge($validated, [
            'main_image' => $main_image,
            'gallery_images' => $gallery,
        ]));

        return redirect()->route('app.product.index')->with('success', 'Product updated successfully.');
    }

    public function delete(Request $request)
    {
        Gate::authorize('app.product.delete');

        $product = Product::find($request->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if ($product->main_image) {
            $this->delete_file($product->main_image, 'products/');
        }

        if (!empty($product->gallery_images)) {
            foreach ($product->gallery_images as $img) {
                $this->delete_file($img, 'products/');
            }
        }

        $product->delete();
        return redirect()->route('app.product.index')->with('success', 'Product deleted successfully.');
    }
}
