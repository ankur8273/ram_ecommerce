<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "categories";
    protected $primaryKey = 'category_id';

    protected $guarded = [];

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
