<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
	protected $fillable=['loan_name','interest','term','frequency'];
    public function borrowers()
    {
    	return $this->belongsToMany(Borrower::class)->withPivot('amount','start_pay_date','status')->withTimestamps();
    }
}
