<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class VariantController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('app.variant.index');

        $query = Variant::with('product')->orderBy('id','desc');

        if ($request->filled('search_text')) {
            $query->where('color', 'LIKE', "%{$request->search_text}%");
        }

        $variants = $query->paginate(10)->through(fn($v) => [
            'id' => $v->id,
            'product_name' => $v->product->name ?? '',
            'size' => $v->size,
            'color' => $v->color,
            'price' => $v->price,
            'stock_qty' => $v->stock_qty,
        ]);

        return Inertia::render('Variants/Index', [
            'variants' => $variants,
            'filters' => $request->only('search_text'),
            'pageTitle' => 'Variants',
        ]);
    }

    public function create()
    {
        Gate::authorize('app.variant.create');
        return Inertia::render('Variants/Create', [
            'products' => Product::select('id','name')->get(),
            'pageTitle' => 'Variant Create',
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('app.variant.create');

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'sleeve_type' => 'nullable|string',
            'collar_type' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock_qty' => 'required|integer|min:0',
        ]);

        Variant::create($validated);
        return redirect()->route('app.variant.index')->with('success', 'Variant created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('app.variant.edit');
        $variant = Variant::findOrFail($id);

        return Inertia::render('Variants/Edit', [
            'variant' => $variant,
            'products' => Product::select('id','name')->get(),
            'pageTitle' => 'Variant Edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('app.variant.edit');
        $variant = Variant::findOrFail($id);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
            'sleeve_type' => 'nullable|string',
            'collar_type' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock_qty' => 'required|integer|min:0',
        ]);

        $variant->update($validated);
        return redirect()->route('app.variant.index')->with('success', 'Variant updated successfully.');
    }

    public function delete(Request $request)
    {
        Gate::authorize('app.variant.delete');
        $variant = Variant::findOrFail($request->id);
        $variant->delete();

        return redirect()->back()->with('success', 'Variant deleted successfully.');
    }
}
