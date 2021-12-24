<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Auth;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $commissions = Commission::where('user_id',Auth::user()->id)->with('ownerOfCommission')->with('order')->get();

        return view('commission.index', compact('commissions'));
    }
}
