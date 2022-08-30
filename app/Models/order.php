<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\item;

class order extends Model
{
    use HasFactory;

    protected $tables = 'orders';

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'status',
        'message',
        'tracking_no',
    ];
    public function orderitems()
    {
        return $this->hasMany(item::class);
    }
}
