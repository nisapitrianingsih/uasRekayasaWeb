<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'min_stock',
        'supplier_id'
    ];
       public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
