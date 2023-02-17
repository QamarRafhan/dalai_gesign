<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    protected $casts = [
        'fname'=>'array'
    ];
    public function index()
    {
        $funds=Fund::with('fundsManagement')->paginate(10);
        return view('funds.index',['funds' => $funds]);
    }
    public function create()
    {
        return view('funds.fundcreate');
    }
    public function store(Request $request)
    {
        $fname=new Fund;
        $fname=$request->name;
        $fname->save();
        return redirect()->route('fundcreate')->with('success','Fund Created Successfully.');
    }
}
