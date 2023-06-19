<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');    
    }
    public function user()
    {
        return $this->belongsTo(User::class);    
    }
    public function scopeSearch($query, $keyword, $category)
    {
        return $query->when($keyword, function ($query, $keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('lokasi', 'like', '%' . $keyword . '%');
            });
        })->when($category, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('nama', 'like', '%' . $category . '%');
            });
        });
    }

    

}
