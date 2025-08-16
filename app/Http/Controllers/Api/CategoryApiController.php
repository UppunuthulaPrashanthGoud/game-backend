<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryApiController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get()
            ->map(function ($cat) {
                return [
                    'name' => $cat->name,
                    'icon' => $cat->icon ? asset('storage/' . $cat->icon) : null,
                ];
            });
        return response()->json($categories);
    }
}
