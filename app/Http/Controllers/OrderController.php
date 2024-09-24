<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $Id = $request->input('id');

        $previousData = null;
        if ($Id) {
            $previousData = Order::find($Id);
        }
        
        // dd($request->all());
        // Add required fields manually if not provided by the user
        $request->request->add([
            'total_harga' => $request->total_harga,
            'name' => $request->name ?? $previousData->name,
            'no_hp' => $request->no_hp ?? $previousData->no_hp,
            'nama_obat' => $request->nama_obat ?? $previousData->nama_obat,
            'status' => $request->status ?? 'Lunas',
            'user_id' => $request->user_id ?? $previousData->user_id // Add user_id from previous data or request
        ]);
        
        // Continue with saving the order or any other logic
        

        $order = Order::create($request->all());

        // Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'phone' => $request->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
              $order = Order::find($request->order_id);
              $order->update  (['status' => 'Lunas']);
            }
        }
    }
     public function invoice($id){
        $order = Order::find($id);
        return view('invoice', compact('order'));
     }

    // public function data_order()
    // {
    //     $data_order = Order::paginate(1);

    //     return view('user.checkout', compact('data_order'));
    // }

    // public function checkout(Request $request)
    // {
    //     $request->request->add(['total_harga' => $request->qty * 100000, 'name' => 'Nurul']);
    //     $order = Order::create($request->all());

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => $order->id,
    //             'gross_amount' => $order->total_harga,
    //         ),
    //         'customer_details' => array(
    //             'name' => $request->name,
    //             'phone' => $request->no_hp,
    //         ),
    //     );

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     dd($snapToken);
    //     return view('user.checkout', compact('snapToken', 'order'));
    // }
}
