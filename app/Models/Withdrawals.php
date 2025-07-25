<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawals extends Model
{
    use HasFactory;

    public function payments(){
        return $this->hasOne('App\Models\Payments', 'id', 'payments_id');
    }
}
