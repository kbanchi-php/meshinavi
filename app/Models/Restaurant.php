<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Restaurant extends Model
{
    use HasFactory;

    public function scopeSearch(Builder $query, $params)
    {
        if (!empty($params['name'])) {
            $query->where('name', 'like', '%' . $params['name'] . '%');
        }
        if (!empty($params['category'])) {
            // $query->where('category', 'like', '%' . $params['category'] . '%');
            $query->whereHas('category', function ($q) use ($params) {
                $q->where('name', 'like', '%' . $params['category'] . '%');
            });
        }
        return $query;
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function menus()
    {
        return $this->hasMany(\App\Models\Menu::class);
    }
}
