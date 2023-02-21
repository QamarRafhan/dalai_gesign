<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Models\FundManagement;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FundmanagementImport;

class FundController extends Controller
{
    protected $casts = [
        'fname' => 'array'
    ];
    public function index()
    {
        // $funds=Fund::with('fundsManagement')->paginate(10);
        // dd($funds);
        $funds = Fund::join('fund_management', 'fund_management.id_fund', '=', 'funds.id')->paginate(5);

        return view('funds.index', ['funds' => $funds]);
    }
    public function create()
    {
        return view('funds.fundcreate');
    }
    public function store(Request $request)
    {
        $fname = new Fund;
        $fname['name'] = $request->name;
        $fname->save();
        return redirect()->route('funds.index')->with('success', 'Fund Created Successfully.');
    }
    public function edit($id)
    {
        $funds = FundManagement::findOrFail($id);
        return view('funds.edit', ['funds' => $funds]);
    }
    public function update(Request $request, $id)
    {
        $funds = FundManagement::findOrFail($id);
        $funds->update($request->all());
        return redirect()->route('funds.index')->with('success', 'Fund Updated Successfully.');
    }
    public function delete($id)
    {
        $funds = FundManagement::findOrFail($id);
        $funds->delete();
        return redirect()->route('funds.index')->with('success', 'Fund deleted Successfully.');
    }


    public function importFundmanagment()
    {
        return view('funds.fundmanagement');
    }

    public function uploadFundmanagment(Request $request)
    {
        Excel::import(new FundmanagementImport, $request->file);
        return redirect()->route('fundmanagment')->with('success', 'Funds Imported Successfully');
    }
}
