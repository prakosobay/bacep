<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, OrderHistory, OrderItem};

class OrderController extends Controller
{
    public function order_form()
    {
        return view('order.form');
    }

    public function order_store(Request $request)
    {
        // dd($request->all());

        $orderItem = $request->all();

        $validated = $request->validate([
            'req_name' => ['required'],
            'req_email' => ['email', 'required'],
            'req_phone' => ['required'],
            'req_company' => ['required'],
            'req_dept' => ['required'],
            'note' => ['max::255', 'nullable'],
        ]);

        // $createdOrder = Order::create([
        //     'req_name' => $validated['req_name'],
        //     'req_email' => $validated['req_email'],
        //     'req_phone' => $validated['req_phone'],
        //     'req_company' => $validated['req_company'],
        //     'req_dept' => $validated['req_dept'],
        // ]);

        $createdOrder = Order::create([
            'req_name' => $orderItem['req_name'],
            'req_email' => $orderItem['req_email'],
            'req_phone' => $orderItem['req_phone'],
            'req_company' => $orderItem['req_company'],
            'req_dept' => $orderItem['req_dept'],
        ]);

        dd($createdOrder);

        $orderArray = [];
        foreach($orderItem['item'] as $k => $v){
            $insertArray = [];
            if(isset($orderItem['item'][$k])){
                $insertArray = [
                    'order_id' => $createdOrder->id,
                    'item' => $orderItem['item'][$k],
                    'qty' => $orderItem['qty'][$k],
                    'from' => $orderItem['from'][$k],
                    'rack_from' => $orderItem['rack_from'][$k],
                    'to' => $orderItem['to'][$k],
                    'rack_to' => $orderItem['rack_to'][$k],
                    'note' => $orderItem['note'][$k],
                    'updated_at' => now(),
                    'created_at' => now(),
                ];

                $orderArray[] = $insertArray;
            }
        }

        dd($orderArray);

        OrderItem::insert($orderArray);

        $insertHistory = OrderHistory::insert([
            'order_id' => $createdOrder->id,
            'created_by' => auth()->user()->name,
            'status' => 'requested',
            'role_to' => 'review',
            'aktif' => true,
            'pdf' => false,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        if($insertHistory){
            return redirect('logall')->with('success', 'Berhasil Submit Form Consumable');
        } else {
            return back()->with('gagal', 'Gagal Submit Form');
        }
    }
}
