<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('payments')
                    ->select(DB::raw('sum(payments.amount) as today_amount'),DB::raw('(SELECT SUM(AMOUNT) FROM payments WHERE DATE(payment_schedule) > CURDATE()) as remaining_amount'),DB::raw('(SELECT SUM(AMOUNT) FROM payments WHERE DATE(payment_schedule) <= CURDATE()) as received_amount'))
                    ->whereRaw('DATE(payment_schedule)=CURDATE()')
                    ->get();
        return view('dashboard.home')->with(['page_name'=>'ទិន្ន័យសង្ខេប','data'=>$data]);
    }
}
