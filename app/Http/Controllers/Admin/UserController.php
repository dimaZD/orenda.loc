<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function editUser()
    {
        $user = Auth::user();
        $title = 'Редагування даних користувача - '.$user->name;

        return view('admin.user')->with(['title' => $title, 'user' => $user])->render();
    }

    public function updateUser(UserEditRequest $request)
    {
        $user = Auth::user();
        $input = $request->except('_token');
        $user->fill($input);

        if ($user->update()) {
            return redirect('admin')->with('status', 'Дані користуача оновлено');
        }
    }
}
