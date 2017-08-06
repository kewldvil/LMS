<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('loans')->paginate(15);
        return view('loan_setting',['page_name'=>'កំណែរប្រែប្រភេទកម្ចី','loans'=>$data]);
    }
    public function get_datatable()
    {
        return Datatables::eloquent(Loan::query())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_setting_loan',['page_name'=>'បន្ថែមប្រភេទកម្ចីថ្មី']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'loan_name'=>'required',
            'interest'=>'required',
            'term'=>'required',
        ]);
        Loan::create($request->all());
        return redirect('/setting/setting_loan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
