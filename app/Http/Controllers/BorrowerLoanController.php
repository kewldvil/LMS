<?php

namespace App\Http\Controllers;
use App\Borrower;
use App\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
class BorrowerLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $data =DB::table('borrowers')
        //  ->select(DB::raw('*,DATEDIFF(now(),borrower_loan.start_pay_date) AS paid_day,ADDDATE(borrower_loan.start_pay_date,loans.term) AS finish_date'))
        // ->join('borrower_loan','borrowers.id','=','borrower_loan.borrower_id')
        // ->join('loans','loans.id','=','borrower_loan.loan_id')
        // ->get();
        // ->toSql();
        return view('borrower_loan',['page_name'=>'តារាងប្រាក់កម្ចី']);
    }
    public function get_datatable()
    {
        return Datatables::queryBuilder(DB::table('borrowers')
         ->select(DB::raw('*,DATEDIFF(now(),borrower_loan.start_pay_date) AS paid_day,ADDDATE(borrower_loan.start_pay_date,loans.term) AS finish_date,DATEDIFF(ADDDATE(borrower_loan.start_pay_date,loans.term),now()) AS remain_day'))
        ->join('borrower_loan','borrowers.id','=','borrower_loan.borrower_id')
        ->join('loans','loans.id','=','borrower_loan.loan_id'))->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**`
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
