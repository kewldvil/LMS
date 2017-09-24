<?php

namespace App\Http\Controllers;
use App\Borrower;
use App\BorrowerLoan;
use App\Loan;
use App\Payment;
use Session;
use Carbon\Carbon;
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
        
        return view('borrower_loan.home',['page_name'=>'តារាងប្រាក់កម្ចី']);
    }
    public function get_datatable()
    {
        // return Datatables::queryBuilder(DB::table('borrowers')
        //  ->select(DB::raw('*,format(borrower_loan.amount,0) as amount1,DATE_FORMAT(borrower_loan.start_pay_date,"%d-%m-%Y") as start_pay_date1,CASE WHEN DATEDIFF(now(),borrower_loan.start_pay_date)< 0 THEN 0 WHEN DATEDIFF(now(),borrower_loan.start_pay_date)=0 THEN 1 WHEN DATEDIFF(now(),borrower_loan.start_pay_date)> 0 THEN DATEDIFF(now(),borrower_loan.start_pay_date)+1 END AS paid_day,DATE_FORMAT(ADDDATE(borrower_loan.start_pay_date,loans.term-1),"%d-%m-%Y") AS finish_date,CASE WHEN DATEDIFF(NOW(),borrower_loan.start_pay_date)< 0 THEN loans.term WHEN DATEDIFF(NOW(),borrower_loan.start_pay_date)=0 THEN DATEDIFF(ADDDATE(borrower_loan.start_pay_date,loans.term),now())-1 WHEN DATEDIFF(NOW(),borrower_loan.start_pay_date)> 0 THEN DATEDIFF(ADDDATE(borrower_loan.start_pay_date,loans.term),now())-1 END AS remain_day,date_format(ADDDATE(borrower_loan.start_pay_date,loans.frequency),"%d-%m-%Y") as next_pay_date'))
        // ->join('borrower_loan','borrowers.id','=','borrower_loan.borrower_id')
        // ->join('loans','loans.id','=','borrower_loan.loan_id'))->make(true);

        return DB::table('borrowers')
            ->select('*','borrowers.id','borrower_loan.id')
            ->join('borrower_loan','borrowers.id','=','borrower_loan.borrower_id')
            ->join('loans','loans.id','=','borrower_loan.loan_id')
            ->whereRaw('borrower_loan.status=true and DATE_ADD(borrower_loan.start_pay_date,INTERVAL loans.term DAY)>CURRENT_DATE()')
            ->get();

        // return $borrowersLoans= Loan::with('borrowers')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $borrowers=Borrower::all();
        $loans=Loan::all();
        return view('borrower_loan.create',['page_name'=>'បន្ថែមប្រាក់កម្ចីថ្មី','borrowers'=>$borrowers,'loans'=>$loans]);
    }
 
    /**`
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'borrower_id'=>'required',
            'amount'=>'required',
        ]);
        DB::transaction(function($request) use(&$request){
            $id=DB::table('borrower_loan')->insertGetId([
                "borrower_id"=>$request->borrower_id,
                "loan_id"=>$request->loan_id,
                "amount"=>$request->amount,
                "start_pay_date"=>Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d'),
                "status"=>true
            ]);

            $loan = Loan::find($request->loan_id);
            $numberOfPayTime = ceil($loan->term/$loan->frequency);
            $startPayDate= Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d');
            $today=date("Y-m-d");
            for ($i=0; $i < $numberOfPayTime ; $i++) { 
                // $status=0;
                // if($i==0){
                //     if($today==$startPayDate) $status=1;
                // }
                $day = $loan->frequency;
                if($i==$numberOfPayTime-1){
                    if($loan->term % $loan->frequency!=0){
                        $day=$loan->term % $loan->frequency;
                        $startPayDate=Carbon::parse($startPayDate)->addDay($day);
                    }
                }
                
                DB::table('payments')->insert([
                    'borrower_id'=>$request->borrower_id,
                    'borrower_loan_id'=>$id,
                    'payment_schedule'=>$startPayDate,
                    'payment_number'=>$i+1,
                    'amount'=>($request->amount*($loan->interest/100)+$request->amount)/$loan->term,
                    'status'=>1
                ]);
                $startPayDate=Carbon::parse($startPayDate)->addDay($day);
            }
        });

        Session::flash('flash_message', 'កម្ចីថ្មីបានបន្ថែម !');
        return redirect(route('borrower_loan.index'));
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
        $borrower_loan= DB::table('borrower_loan')->where('id','=',$id)->get();
        $borrowers=Borrower::all();
        $loans=Loan::all();
        return view('borrower_loan.edit',['page_name'=>'កែប្រែប្រាក់កម្ចី','borrowers'=>$borrowers,'loans'=>$loans,'borrower_loan'=>$borrower_loan]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_cut_up($id)
    {
        $borrower_loan= DB::table('borrower_loan')->where('id','=',$id)->get();
        $borrowers=Borrower::all();
        $loans=Loan::all();
        return view('borrower_loan.edit_cut_up',['page_name'=>'កែប្រែប្រាក់កម្ចី','borrowers'=>$borrowers,'loans'=>$loans,'borrower_loan'=>$borrower_loan]);
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
    public function destroy(Request $request, $id)
    {
        $this->validate($request,[
            'borrower_id'=>'required',
            'amount'=>'required',
        ]);        
        DB::transaction(function() use($request,$id){
            BorrowerLoan::destroy($id);
            Payment::where('borrower_loan_id',$id)->delete();
            $id=DB::table('borrower_loan')->insertGetId([
                "borrower_id"=>$request->borrower_id,
                "loan_id"=>$request->loan_id,
                "amount"=>$request->amount,
                "start_pay_date"=>Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d'),
                "status"=>true
            ]);

            $loan = Loan::find($request->loan_id);
            $numberOfPayTime = ceil($loan->term/$loan->frequency);
            $startPayDate= Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d');
            $today=date("Y-m-d");
            for ($i=0; $i < $numberOfPayTime ; $i++) { 
                // $status=0;
                // if($i==0){
                //     if($today==$startPayDate) $status=1;
                // }
                $day = $loan->frequency;
                if($i==$numberOfPayTime-1){
                    if($loan->term % $loan->frequency!=0){
                        $day=$loan->term % $loan->frequency;
                        $startPayDate=Carbon::parse($startPayDate)->addDay($day);
                    }
                }
                
                DB::table('payments')->insert([
                    'borrower_id'=>$request->borrower_id,
                    'borrower_loan_id'=>$id,
                    'payment_schedule'=>$startPayDate,
                    'payment_number'=>$i+1,
                    'amount'=>($request->amount*($loan->interest/100)+$request->amount)/$loan->term,
                    'status'=>1
                ]);
                $startPayDate=Carbon::parse($startPayDate)->addDay($day);
            }
        });
            Session::flash('flash_message', 'កម្ចីបានកែប្រែ !');
            return redirect(route('borrower_loan.index'));
    }
    public function cut_up(Request $request,$id)
    {
        $this->validate($request,[
            // 'borrower_id'=>'required',
            'amount'=>'required',
        ]);        
        DB::transaction(function() use($request,$id){
            BorrowerLoan::destroy($id);
            Payment::where('borrower_loan_id',$id)
                    ->whereRaw('DATE(payment_schedule)>CURDATE()')
                    ->delete();
            $id=DB::table('borrower_loan')->insertGetId([
                "borrower_id"=>$request->borrower_id,
                "loan_id"=>$request->loan_id,
                "amount"=>$request->amount,
                "start_pay_date"=>Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d'),
                "status"=>true
            ]);

            $loan = Loan::find($request->loan_id);
            $numberOfPayTime = ceil($loan->term/$loan->frequency);
            $startPayDate= Carbon::createFromFormat('d/m/Y',$request->start_pay_date)->format('Y-m-d');
            $today=date("Y-m-d");
            for ($i=0; $i < $numberOfPayTime ; $i++) { 
                // $status=0;
                // if($i==0){
                //     if($today==$startPayDate) $status=1;
                // }
                $day = $loan->frequency;
                if($i==$numberOfPayTime-1){
                    if($loan->term % $loan->frequency!=0){
                        $day=$loan->term % $loan->frequency;
                        $startPayDate=Carbon::parse($startPayDate)->addDay($day);
                    }
                }
                
                DB::table('payments')->insert([
                    'borrower_id'=>$request->borrower_id,
                    'borrower_loan_id'=>$id,
                    'payment_schedule'=>$startPayDate,
                    'payment_number'=>$i+1,
                    'amount'=>($request->amount*($loan->interest/100)+$request->amount)/$loan->term,
                    'status'=>1
                ]);
                $startPayDate=Carbon::parse($startPayDate)->addDay($day);
            }
        });
            Session::flash('flash_message', 'កម្ចីបានកាច់ឡើង !');
            return redirect(route('borrower_loan.index'));
    }
    public function destroy_bl(Request $request,$id)
    {
        DB::transaction(function() use($request,$id){
            BorrowerLoan::destroy($id);
            Payment::where('borrower_loan_id',$id)->delete();            
        });
            Session::flash('flash_message', 'កម្ចីបានលុប !');
            return redirect(route('borrower_loan.index'));        
    }
}
