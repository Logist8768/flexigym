<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'address_id',
        'subtotal',
        'discount',
        'total',
        'status',
        'coupon_code',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\CartFactory::new ();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'carts_products')
            ->withPivot([
                'product_id',
                'quantity',
                'subtotal',
                'discount',
                'vat',
                'total',
            ])
            ->withTimestamps();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function updateTotals()
    {
        $this->subtotal = $this->products->sum('pivot.subtotal');
        $this->total = $this->products->sum('pivot.total') - $this->discount;
        $this->vat = $this->products->sum('pivot.vat');
        $this->save();
    }
}
