<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
class Transaction extends Model
{
    public function payment()
    {
    	return $this->hasOne(Payment::class);
    }
}
