<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Models\FundOperation;

class FundOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Fund $fund)
    {
        $operations = FundOperation::where('ID_fund', $fund->id)->paginate(10);
        return view('funds.operations.index', ['fund' => $fund, 'operations' => $operations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Fund $fund)
    {
        $fundOperation = new FundOperation();
        return view('funds.operations.create', ['fund' => $fund, 'fundOperation' => $fundOperation]);
    }

    /**
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
    public function edit(Fund $fund, FundOperation $operation)
    {
        
        return view('funds.operations.edit', ['fund' => $fund,'fundOperation' => $operation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  FundOperation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Fund $fund ,FundOperation $operation)
    {
        $data = $request->only($operation->getFillable());
        $operation->fill($data)->save();
        return redirect()->route('funds.operations.index', ['fund' => $fund])->with('success', 'Data Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FundOperation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FundOperation $operation)
    {
        $operation->delete();
        return redirect()->route('requests.index')->with('success', 'Record Removed Successfully.');
    }
}
