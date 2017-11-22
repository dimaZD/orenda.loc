<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Order;
use Auth;

class OrderController extends Controller
{
    //
    public function exec($flat_id, OrderCreateRequest $request)
    {
        $inputs = $request->except('_token');
        $inputs['user_id'] = Auth::id();
        $inputs['flat_id'] = $flat_id;
        $order = new Order();
        $order->fill($inputs);

        if ($order->save()) {
            return redirect()->back()->with('status', 'Бронювання здійснено та чекає на підтвердження');
        }
    }

    public function accept($flat_id, $order_id)
    {
        $order = Order::findOrFail($order_id);
        $booked = Order::where(function ($query) use ($order) {
            $query->where(function ($query) use ($order) {
                $query->where('start_date', '<=', $order->start_date)
                    ->where('end_date', '>=', $order->start_date);
            })->orWhere(function ($query) use ($order) {
                $query->where('start_date', '>=', $order->start_date)
                    ->where('end_date', '<=', $order->end_date);
            })->orWhere(function ($query) use ($order) {
                $query->where('start_date', '<=', $order->end_date)
                    ->where('end_date', '>=', $order->end_date);
            })->orWhere(function ($query) use ($order) {
                $query->where('start_date', '<=', $order->start_date)
                    ->where('end_date', '>=', $order->end_date);
            });
        })->where('status', '1')->where('flat_id', $flat_id)->first();

        if (!$booked) {
            $order->status = 1;
            if ($order->update()) {
                return redirect()->back()->with('status', 'Бронювання підтверджено');
            }
        } else {
            return redirect()->back()->with('status', 'Нажаль дану квартиру на вибрані дати вже заброньовано');
        }
    }

    public function cancel($order)
    {
        Order::where('id', $order)->delete();

        return redirect()->back()->with('status', 'Бронювання скасовано');
    }
}
