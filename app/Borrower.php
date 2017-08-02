<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Transaction;
class Borrower extends Model
{
    protected $fillable =['name','address','photo','phone','sex'];
    public function loans()
    {
    	return $this->belongsToMany(Loan::class);
    }

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}
