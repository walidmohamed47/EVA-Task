<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionFactory;
use App\Models\Order;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
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

        $orders = Order::where('user_id',Auth::user()->id)->with('ownerOfOrder')->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = Order::rules();
        $messages = Order::messages();
        $data = $this->validate(request(), $rules, $messages);
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;

        $account_type = $this->get_account_type($user_id);
        // if account_type 1 is a Free account
        // if account_type 2 is a Premium account
        $commission_type = $this->get_commission_type($user_id);
        // if commission_type 1 is a first order
        // if account_type 2 is another order

        $value_of_commission_percent = (new CommissionFactory())->calculate_value_of_commission($account_type,$commission_type,$data['amount']);

        $order = Order::create($data);

        Commission::create([
            'order_id' => $order->id,
            'user_id' => $user_id,
            'value_of_commission' => $value_of_commission_percent
        ]);

        session()->push('message',['type'=>'Added','message'=>'Order Added Successfully']);
        return redirect('order/index');

    }

    private function get_account_type($user_id){
        $user = User::find($user_id);
        return $user->account_type;
    }

    private function get_commission_type($user_id){
        $countCommissions = Order::where('user_id',$user_id)->count();
        if ($countCommissions < 1)
            return 1;
        else
            return 2;
    }

}
