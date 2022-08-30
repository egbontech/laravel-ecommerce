<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\product;
class item extends Model
{
    use HasFactory;

    protected $tables = 'items';

    protected $fillable = [
      'order_id',
      'product_id',
      'price',
      'qty',
    ];
    public function products()
    {
      return $this->belongsTo(product::class,'product_id','id');
    }
}
