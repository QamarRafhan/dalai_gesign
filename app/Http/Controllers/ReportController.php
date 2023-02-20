<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\User;
use App\Models\Report;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Models\UserOperation;
use App\Models\FundManagement;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //use
    public function create()
    {
        return view('reports.create');
    }
    public function store(Request $request)
    {
        $report = new Report;
        $report['name'] = $request->name;
        $report['amount'] = $request->amount;
        $report['amount_eur'] = $request->amount_eur;
        $report['date'] = $request->date;
        $report['status'] = $request->status;
        $report->save();
        return redirect()->route('reportsave')->with('success', 'Report Added Successfully.');
    }
    public function allrequests()
    {

        $allreqs=UserRequest::first();
        // dd($allreqs->fund);
        
        $allreqs = FundManagement::join('funds', 'funds.id', '=', 'fund_management.id_fund')
            ->join('user_operations', 'user_operations.id_fund', '=', 'fund_management.id_fund')
            ->where('fund_management.id_fund', '=', auth()->user()->id)->paginate(5);

        return view('request.index', ['allreqs' => $allreqs]);
    }
}
