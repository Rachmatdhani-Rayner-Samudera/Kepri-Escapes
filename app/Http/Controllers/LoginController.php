<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryD;
use App\Models\Order;
use App\Models\Destination;


class OrderController extends Controller
{
    public function index(){
        $destcategory = CategoryD::all();
        return view("order.index", compact("destcategory"));
    }
    public function checkout(Request $request){
        // dd($request->all(), $request->price * 1000);

        $bebas = $request->price * 1000;
        $request->request->add([
            'total_price' => $request->qty * $bebas, 
            'status' => 'Unpaid'
        ]);
     
        $order = Order::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'qty'=> $request->qty,
            'total_price'=> $request->total_price,
            'package_name'=> $request->package_name,
            'status' => $request->status
        ]);
      
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
    
    public function transactiondata(Order $order){
        $order = Order::all();
        return view('order.transaction', compact('order'));
    }
}
