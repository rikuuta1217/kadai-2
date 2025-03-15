<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeason extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'season_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class,'season_id');
    }
}
