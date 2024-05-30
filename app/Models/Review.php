<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content', 'number_starts', 'account_id', 'product_id'];
    use HasFactory;

    public function account() {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }
}
