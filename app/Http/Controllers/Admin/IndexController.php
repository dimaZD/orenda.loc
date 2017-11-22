<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Flat;
use App\User;
use Auth;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'Особистий кабінет';
        $id = Auth::id();
        $flats = Flat::where('user_id', $id)->get(array('id', 'name', 'image'));
        $user = User::where('id', $id)->get(array('id', 'name', 'email'))->first();

        return view('admin.index')->with(['title' => $title, 'user' => $user, 'flats' => $flats])->render();
    }
}
