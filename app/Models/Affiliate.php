<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;
    
    protected $fillable = ['category_id', 'pet_id', 'affiliate_look_up_id', 'brand_id', 'status_id', 'sold_by_id', 'delivery_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    public function affiliate_look_up()
    {
        return $this->belongsTo(AffiliateLookUp::class, 'affiliate_look_up_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function sold_by()
    {
        return $this->belongsTo(SoldBy::class, 'sold_by_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }
}