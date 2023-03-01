<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Models\FundManagement;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FundmanagementImport;

class FundController extends Controller
{

    public function index()
    {

        $funds = Fund::paginate(5);
        return view('funds.index', ['funds' => $funds]);
    }
    public function create()
    {
        return view('funds.create');
    }
    public function store(Request $request)
    {
        $fname = new Fund;
        $fname['name'] = $request->name;
        $fname->save();
        return redirect()->route('funds.index')->with('success', 'Fund Created Successfully.');
    }
    public function edit(Fund $fund)
    {
        return view('funds.edit', ['fund' => $fund]);
    }
    public function update(Request $request, Fund $fund)
    {
        $data = $request->only($fund->getFillable());
        $fund->fill($data)->save();
        return redirect()->route('funds.index')->with('success', 'Fund Updated Successfully.');
    }
    public function destroy(Fund $fund)
    {
        $fund->delete();
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
