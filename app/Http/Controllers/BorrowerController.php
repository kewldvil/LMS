<?php

namespace App\Http\Controllers;

use App\Borrower;
use Session;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $borrwers=Borrower::all();
        // dd($borrwers->toJson());
        
        return view('borrower.home')->with('page_name','តារាងអតិថិជន');
    }
    public function get_datatable()
    {
        return Borrower::all();
        //return Datatables::eloquent(Borrower::query())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('borrower.create')->with('page_name','បន្ថែមអតិថិជនថ្មី');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $photoName=time().''.$request->photo->getClientOriginalName();
            $request->photo->storeAs('public',$photoName);
            $data['photo']=$photoName;
        }else{
            $request->sex=='m'?$data['photo']='boy.png':$data['photo']='girl.png';
        }

        Session::flash('flash_message', 'អតិថិជនថ្មីបានបន្ថែម !');
        Borrower::create($data);
        return redirect('/borrower');    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrower $borrower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        //
    }
}
