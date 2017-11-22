<?php

namespace App\Http\Controllers;

use App\Flat;
use App\Http\Requests\FlatSearchRequest;
use App\Order;
use Auth;

class IndexController extends Controller
{
    //
    protected $title;

    public function __construct()
    {
        $this->title = 'Квартири подобово';
    }

    public function index()
    {
        $flats = Flat::get(array('id', 'name', 'image'));

        return view('welcome')->with(['flats' => $flats, 'title' => $this->title]);
    }

    public function show($id)
    {
        $flat = Flat::findOrFail($id);
        $arr = ['flat' => $flat, 'title' => $this->title];
        $bookeds = Order::where('flat_id', $flat->id)->where('status', 1)->get();
        if ($bookeds->count() > 0) {
            foreach ($bookeds as $booked) {
                $arr['booked_dates'][] = [$booked->start_date, $booked->end_date];
            }
        } else {
            $arr['booked_dates'] = [];
        }
        if (Auth::id() == $flat->user_id) {
            $orders = Order::where('flat_id', $flat->id)->where('status', 0)->get();
            $arr['orders'] = $orders;
        }

        return view('flat')->with($arr);
    }

    public function search(FlatSearchRequest $request)
    {
        $inputs = $request->except('_token');
        $inputs['seats'] = isset($inputs['seats']) ? $inputs['seats'] : 1;
        $flats = Flat::where('seats', '>=', $inputs['seats'])
            ->whereNotIn(
                'id',
                Order::where(function ($query) use ($inputs) {
                    $query->where(function ($query) use ($inputs) {
                        $query->where('start_date', '<=', $inputs['start_date'])
                            ->where('end_date', '>=', $inputs['start_date']);
                    })->orWhere(function ($query) use ($inputs) {
                        $query->where('start_date', '>=', $inputs['start_date'])
                            ->where('end_date', '<=', $inputs['end_date']);
                    })->orWhere(function ($query) use ($inputs) {
                        $query->where('start_date', '<=', $inputs['end_date'])
                            ->where('end_date', '>=', $inputs['end_date']);
                    })->orWhere(function ($query) use ($inputs) {
                        $query->where('start_date', '<=', $inputs['start_date'])
                            ->where('end_date', '>=', $inputs['end_date']);
                    });
                })
                    ->where('status', '1')
                    ->groupBy('flat_id')
                    ->get(['flat_id'])
            )
            ->get(['id', 'name', 'image']);

        return view('welcome')->with(['flats' => $flats, 'title' => $this->title]);
    }
}
