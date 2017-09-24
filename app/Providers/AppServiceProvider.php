<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\DB;
use App\Borrower;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $countBorrower = Borrower::count();
        $countBorrowerLoan= DB::table('borrower_loan')
                            ->select(DB::raw('count(borrower_loan.id) as totalBorrowerLoan'))
                            ->join('loans','loans.id','=','borrower_loan.loan_id')
                            ->whereRaw('borrower_loan.status = true and DATE_ADD(borrower_loan.start_pay_date,INTERVAL loans.term DAY)>CURRENT_DATE()')
                            ->get();
        view()->share(['totalBorrower'=>$countBorrower,'totalBorrowerLoan'=>$countBorrowerLoan]);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
