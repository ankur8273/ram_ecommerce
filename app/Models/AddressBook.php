<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "address_books";
    protected $primaryKey = 'address_id';

    protected $guarded = [];
}
