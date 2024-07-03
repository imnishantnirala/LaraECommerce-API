<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantAccount extends Model
{
    use HasFactory;
    protected  $fillable = [
        'banking_id', 'user_id', 'name', 'slug', 'address', 'bank_account_name', 'bank_account_number', 'bank_branch_name', 'image', 'balance'
    ];
}
