<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use App\Models\UserOperation;

class UserOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = UserOperation::query();
        if (!$request->user()->hasRole('Admin')) {
            $query->where('ID_user', $request->user()->id);
        }
        $operations = $query->paginate(10);
        return view('users.operations.index', ['operations' => $operations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userOperation = new UserOperation();

        $funds = Fund::select('id', 'name')->get();
        return view('users.operations.create', ['userOperation' => $userOperation, 'funds' => $funds]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $operation = new UserOperation();
        $data = $request->only($operation->getFillable());

        $operation->fill($data)->save();

        $data['ID_user'] = $request->user()->id;
        return redirect()->route('operations.index')->with('success', 'Data Updated Successfully.');
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
    public function edit(UserOperation $operation)
    {

        $funds = Fund::select('id', 'name')->get();
        return view('users.operations.edit', ['userOperation' => $operation, 'funds' => $funds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  UserOperation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fund $fund, UserOperation $operation)
    {
        $data = $request->only($operation->getFillable());
        $operation->fill($data)->save();
        return redirect()->route('operations.index')->with('success', 'Data Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserOperation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserOperation $operation)
    {
        $operation->delete();
        return redirect()->route('operations.index')->with('success', 'Record Removed Successfully.');
    }
}
