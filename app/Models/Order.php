<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "orders";
    protected $primaryKey = 'order_id';

    protected $guarded = [];

    public function visitor()
    {
        return $this->hasOne(Visitor::class, 'visitor_id', 'visitor_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
