<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\FundManagement;
use Illuminate\Http\Request;

class FundManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Fund $fund)
    {
        $managements = FundManagement::where('ID_fund', $fund->id)->paginate(10);
        return view('funds.managements.index', ['fund' => $fund, 'managements' => $managements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Fund $fund)
    {
        $management = new FundManagement();
        return view('funds.managements.create', ['fund' => $fund, 'management' => $management]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fund $fund)
    {
        $management = new FundManagement();
        $data = $request->only($management->getFillable());
        $data['ID_fund']=$fund->id;
        $management->fill($data)->save();
        return redirect()->route('funds.fund-management.index', ['fund' => $fund])->with('success', 'Data Stored Successfully.');
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
     * @param  FundManagement  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundManagement $operation)
    {
        $data = $request->only($operation->getFillable());
        $request->fill($data)->save();
        return redirect()->route('requests.index')->with('success', 'Data Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FundManagement  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FundManagement $operation)
    {
        $operation->delete();
        return redirect()->route('requests.index')->with('success', 'Record Removed Successfully.');
    }
}
