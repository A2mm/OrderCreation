<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Order\CreateOrderApiRequest;
use App\Http\Resources\Api\V1\Order\OrderApiResource;
use App\Models\Commission;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    public function create_order(CreateOrderApiRequest $request)
    {
        // authenticated user data (replaced with token)
        $auth_user_id = $request->user_id;
        $amount       = $request->amount;
        $auth_user    = User::findOrFail($auth_user_id);

        $data = [
            'user_id' => $auth_user_id,
            'amount'  => $amount,
        ];

        $order = Order::create($data);
        
        // check for user type (free, premium)
        $check_user_type        = check_user_type($auth_user->account_type);
        // check commission for first order and for other orders
        $count_rest_orders      = $auth_user->orders()->where('id', '!=', $order->id)->count();
        $check_user_first_order = check_user_first_order($count_rest_orders);

        $this->detect_commision($check_user_type, $check_user_first_order, $auth_user_id, $order);
        // create order item
        $resorce_data = new OrderApiResource($order);
        return response()->json([
            'data' => $resorce_data,
        ], 201);
    }

    // start detect_commision
    public function detect_commision($check_user_type, $check_user_first_order, $auth_user_id, $order)
    {
        $commission_item = Commission::create([
                    'user_id'   => $auth_user_id,
                    'order_id'  => $order->id,
                    'value'     => 0,
                ]);
        // start free condition
        if ($check_user_type == 'free') {
            if (!$check_user_first_order) {
                $commission_item->update(['value' => 5]);
            }else{
                $commission_item->update(['value' => 8]);
            }
        } 
        // end free condition
        // start premium condition
        else{ 
            if (!$check_user_first_order) {
                $commission_item->update(['value' => 10]);
            }else{
                $commission_item->update(['value' => 20]);
            }
        }  // end premium condition
    } 
    // end detect_commision 
}
