<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fund;
use App\Models\Report;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allreqs = UserRequest::with('fund')->orderBy('date', 'DESC')->paginate(10);
        $funds = Fund::select('id', 'name')->get();
        return view('request.index', ['allreqs' => $allreqs, 'funds' => $funds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report = new UserRequest;
        return view('requests.create', ['report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userRequest = new UserRequest();
        $data = $request->only($userRequest->getFillable());
        $data['date'] = Carbon::now();
        $data['ID_user'] = $request->user()->id;
        $userRequest->fill($data)->save();
        return redirect()->route('reports.index')->with('success', 'Report Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $httprequest, UserRequest $request)
    {
        return view('request.edit', ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $httprequest, UserRequest $request)
    {
        $funds = Fund::select('id', 'name')->get();
        return view('request.edit', ['request' => $request, 'funds' => $funds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $httprequest, UserRequest $request)
    {
        $data = $httprequest->only($request->getFillable());
        $request->fill($data)->save();
        return redirect()->route('requests.index')->with('success', 'Request Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $httprequest, UserRequest $request)
    {

        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Request Deleted Successfully!.');
    }
}
