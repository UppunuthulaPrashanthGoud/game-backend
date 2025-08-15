<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $games = Game::with('category')->orderBy('title')->paginate(20);
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('admin.games.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'url' => 'required|url|max:500',
            'icon' => 'nullable|image|max:2048',
            'requires_vpn' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $data['requires_vpn'] = $request->boolean('requires_vpn');
        $data['is_active'] = $request->boolean('is_active');
        Game::create($data);
        return redirect()->route('admin.games.index')->with('status', 'Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): View
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game): View
    {
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('admin.games.edit', compact('game','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'url' => 'required|url|max:500',
            'icon' => 'nullable|image|max:2048',
            'requires_vpn' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);
        if ($request->hasFile('icon')) {
            if ($game->icon) Storage::disk('public')->delete($game->icon);
            $data['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $data['requires_vpn'] = $request->boolean('requires_vpn');
        $data['is_active'] = $request->boolean('is_active');
        $game->update($data);
        return redirect()->route('admin.games.index')->with('status', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();
        return back()->with('status', 'Deleted');
    }

    public function toggle(Request $request, Game $game): RedirectResponse
    {
        $game->is_active = !$game->is_active;
        $game->save();
        return back()->with('status', 'Status updated');
    }
}
