<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "products";
    protected $primaryKey = 'product_id';

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function getStatusDisplayAttribute()
    {
        if (is_null($this->attributes['status_id']) || $this->attributes['status_id'] == "") {
            return "Inactive";
        } else {
            #1-Completed,2-Pending,3-Assign
            switch ($this->attributes['status_id']) {
                case '1':
                    return 'Active';
                    break;
                case '2':
                    return 'Inactive';
                    break;
                default:
                    return 'Inactive';
                    break;
            }
        }
    }

}
