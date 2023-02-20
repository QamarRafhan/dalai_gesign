<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\FundManagement;
use Illuminate\Http\Request;

class FundController extends Controller
{
    protected $casts = [
        'fname'=>'array'
    ];
    public function index()
    {
        // $funds=Fund::with('fundsManagement')->paginate(10);
        // dd($funds);
        $funds=Fund::join('fund_management','fund_management.id_fund' ,'=','funds.id')->paginate(5);
      
        return view('funds.index',['funds' => $funds]);
    }
    public function create()
    {
        return view('funds.fundcreate');
    }
    public function store(Request $request)
    {
        $fname=new Fund;
        $fname['name']=$request->name;
        $fname->save();
        return redirect()->route('fundlist')->with('success','Fund Created Successfully.');
    }
    public function edit($id)
    {
        $funds=FundManagement::findOrFail($id);
        return view('funds.edit',['funds'=>$funds]);
    }
    public function update(Request $request ,$id)
    {
        $funds=FundManagement::findOrFail($id);
        $funds->update($request->all());
        return redirect()->route('fundlist')->with('success','Fund Updated Successfully.');
    }
    public function delete($id)
    {
        $funds=FundManagement::findOrFail($id);
        $funds->delete();
        return redirect()->route('fundlist')->with('success','Fund deleted Successfully.');
    }
}
