<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
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
        return view('setting.loan.home',['page_name'=>'កំណែរប្រែប្រភេទកម្ចី','loans'=>$data]);
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
        return view('setting.loan.create',['page_name'=>'បន្ថែមប្រភេទកម្ចីថ្មី']);
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
        Session::flash('flash_message', 'កម្ចីថ្មីបានបន្ថែម !');
        return redirect(route('loan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $loan=Loan::find($loan->id);
        return view('setting.loan.edit',['page_name'=>'កែប្រែប្រភេទកម្ចី','loan'=>$loan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Loan $loan)
    {
        // dd($request->all());
        $loan->loan_name=$request->loan_name;
        $loan->interest=$request->interest;
        $loan->term=$request->term;
        $loan->frequency=$request->frequency;
        $loan->save();
        Session::flash('flash_message', 'កម្ចីបានកែប្រែ !');
        return redirect(route('loan.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        Loan::destroy($loan->id);
        Session::flash('flash_message', 'កម្ចីបានលុប !');
        return redirect(route('loan.index'));
    }
}
