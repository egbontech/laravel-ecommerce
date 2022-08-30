<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\product;

class cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_qty'
    ];
    public function products()
    {
        return $this->belongsTo(product::class,'product_id','id');
    }
}
