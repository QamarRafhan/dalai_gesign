<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function index()
    {
        $funds=Fund::all()->paginate(10);
        return view('funds.index',['funds' => $funds]);
    }
    public function create()
    {
        return view('funds.fundcreate');
    }
    public function save(Request $request)
    {
        return view('funds.fundcreate');
    }
}
