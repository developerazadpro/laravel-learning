<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;

class SingleActionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Soft Delete
        // $order = Order::find(11);
        // if($order){
        //     $order->delete();
        //     echo "Order soft deleted";
        // }else {
        //     echo "Order not found";
        // }

        // Restore a soft delete
        // $order = Order::withTrashed()->find(1);
        // if($order){
        //     $order->restore();
        //     echo "Order restored successfully";
        // }else {
        //     echo "Order not found";
        // }

        // Permanent Delete
        // $order = Order::withTrashed()->find(11);
        // if($order){
        //     $order->forceDelete();
        //     echo "Order permanently deleted";
        // }else {
        //     echo "Order not found";
        // }

        // Retrieve soft Deteled records

        /*.........Exclude deleted records.........*/
        //return Order::all();

        /*.........Include soft-deleted records....*/
        //return Order::withTrashed()->get();

        /*.........Only soft-deleted records....*/
        //return Order::onlyTrashed()->get();


    }
}
