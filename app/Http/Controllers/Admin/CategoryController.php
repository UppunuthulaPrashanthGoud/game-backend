<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::orderBy('name')->paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:120',
            'icon' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);
        if (empty($data['slug'])) {
            $data['slug'] = str($data['name'])->slug();
        }
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('status', 'Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:120',
            'icon' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);
        if (empty($data['slug'])) {
            $data['slug'] = str($data['name'])->slug();
        }
        if ($request->hasFile('icon')) {
            if ($category->icon) Storage::disk('public')->delete($category->icon);
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('status', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return back()->with('status', 'Deleted');
    }

    public function toggle(Request $request, Category $category): RedirectResponse
    {
        $category->is_active = !$category->is_active;
        $category->save();
        return back()->with('status', 'Status updated');
    }
}
