<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countOrders = Order::where('user_id',Auth::user()->id)->count();
        $countCommissions = Commission::where('user_id',Auth::user()->id)->count();

        $orders = Order::where('user_id',Auth::user()->id)->latest()->take(5)->with('ownerOfOrder')->get();
        $commissions = Commission::where('user_id',Auth::user()->id)->latest()->take(5)->with('ownerOfCommission')->get();
        return view('home',compact('countOrders','countCommissions','orders','commissions'));
    }
}
