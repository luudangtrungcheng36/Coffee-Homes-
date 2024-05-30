<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $appends = ['totalPrice'];

    protected $fillable = [
        'name',
        'email',
        'address',
        'phonenumber',
        'account_id',
        'status',
    ];

    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function account() {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function getTotalPriceAttribute() {
        $t = 0;
        foreach ($this->details as $item) {
            $t += $item->price * $item->quantity;
        } 
        return $t;
    }

}
