<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'is_active', 'icon',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
