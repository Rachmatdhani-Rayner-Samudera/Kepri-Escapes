<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryD;
use App\Models\Order;


class OrderController extends Controller
{
    public function index(){
        $destcategory = CategoryD::all();
        return view("order.index", compact("destcategory"));
    }
    public function checkout(Request $request){
        // dd($request->all());
        $request->request->add([
            'total_price' => $request->qty * 10, 
            'status' => 'Unpaid'
        ]);
        $order = Order::create($request->all());

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => "",
                'phone' => $request->phone,
            ),
        );

        $destcategory = CategoryD::all();
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view("order.checkout", compact('snapToken','order','destcategory'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == "capture" or $request->transaction_status == "settlement"){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
         }
    }

    public function invoice($id){
        $destcategory = CategoryD::all();
        $order = Order::find($id);
        return view('order.invoice', compact('order','destcategory'));
    }
    
}
