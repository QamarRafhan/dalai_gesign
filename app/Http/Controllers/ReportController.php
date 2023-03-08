<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::orderBy('date', 'DESC')->paginate(10);

        return view('reports.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report = new Report;
        return view('reports.create', ['report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Report();
        $data = $request->only($banner->getFillable());
        if ($request->hasFile('report_file')) {
            $image = $request->file('report_file');
            $imageName = rand(111111, 9999999) . $image->getClientOriginalName();
            Storage::putFileAs('public/report_file', $image, $imageName);
            $data['route'] = $imageName;
        }
        $data['date'] = Carbon::now()->format('d-m-Y');
        $banner->fill($data)->save();
        return redirect()->route('reports.index')->with('success', 'Report Added Successfully.');
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
     $report=Report::find($id);
     return view('reports.edit', ['report' => $report]);

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
        $reportdata = Report::find($id);
        $data = $request->only($reportdata->getFillable());
        if ($request->hasFile('report_file')) {
            $image = $request->file('report_file');
            $imageName = rand(111111, 9999999) . $image->getClientOriginalName();
            Storage::putFileAs('public/report_file', $image, $imageName);
            $data['route'] = $imageName;
        }
        $data['date'] = Carbon::now()->format('d-m-Y');
        $reportdata->fill($data)->save();
        return redirect()->route('reports.index')->with('success', 'Report updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reportdata = Report::find($id);
        $reportdata->delete();
        return redirect()->route('reports.index')->with('success', 'Report Data Deleted Successfully.');
    }
}
