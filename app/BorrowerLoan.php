<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
class BorrowerLoan extends Model
{
    protected $table='borrower_loan';

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }

}
