<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Order, OrderHistory, OrderItem};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifConsumableFull, NotifConsumableReject, NotifConsumableForm};

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
            'qty' => ['required'],
            'item' => ['required'],
        ]);

        $createdOrder = Order::create([
            'req_name' => $validated['req_name'],
            'req_email' => $validated['req_email'],
            'req_phone' => $validated['req_phone'],
            'req_company' => $validated['req_company'],
            'req_dept' => $validated['req_dept'],
        ]);

        $orderArray = [];
        foreach($orderItem['item'] as $k => $v){
            $insertArray = [];
            if(isset($orderItem['item'][$k])){
                $insertArray = [
                    'id' =>  Str::uuid(),
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

        $insertItem = OrderItem::insert($orderArray);

        $insertHistory = OrderHistory::insert([
            'id' => Str::uuid(),
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
            $notif_email = Order::findOrFail($createdOrder->id);
            // dd($notif_email);
            foreach ([
                'bayu.prakoso@balitower.co.id', 'yoga.agus@balitower.co.id'
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifConsumableForm($notif_email));
            }

            return redirect('logall')->with('success', 'Form Has Been Submited');
        } else {
            return back()->with('gagal', 'Failed to Submit Form');
        }
    }


}
