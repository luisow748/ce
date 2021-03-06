<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'qty', 'minimum_qty', 'paid_price',
        'new_price', 'category', 'category_id', 'cod', 'location', 'pb', 'pl', 'width',
         'height', 'depth', 'measure_unit', 'brand', 'model', 'st', 'tax_type', 'expiration'];
    protected $attributes = [
        'description' => 'Valor padrão de descrição',
        'photo_name' => 'Valor padrão de Foto',
        'qty' => 1,
        'minimum_qty' => 1,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
