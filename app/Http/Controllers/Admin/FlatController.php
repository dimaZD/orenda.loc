<?php

namespace App\Http\Controllers\Admin;

use App\Flat;
use App\Http\Requests\FlatCreateUpdateRequest;
use App\Http\Controllers\Controller;
use Auth;


class FlatController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Добавити квартиру';

        return view('admin.flat')->with(['title' => $title])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlatCreateUpdateRequest $request)
    {
        $inputs = $request->except('_token');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $inputs['image'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/img', $inputs['image']);
        }
        $flat = new Flat();
        $flat->fill($inputs);

        if ($request->user()->flat()->save($flat)) {
            return redirect('admin')->with('status', 'Квартира добавлена');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $flat = Flat::findOrFail($id);

        if ($flat->user_id === $user_id) {
            $title = 'Редагувати квартиру';
            return view('admin.flat')->with(['flat' => $flat, 'title' => $title])->render();
        } else {
            return redirect('admin')->with('status', 'У вас немає прав доступу до даного матеріалу');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlatCreateUpdateRequest $request, $id)
    {
        $inputs = $request->except('_token');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path().'/assets/img', $file->getClientOriginalName());
            $inputs['image'] = $file->getClientOriginalName();
        } else {
            $inputs['image'] = $inputs['old_image'];
        }
        unset($inputs['old_image']);
        $flat = Flat::find($id);
        $flat->fill($inputs);

        if ($flat->update()) {
            return redirect('admin')->with('status', 'Дані оновлено');
        }
    }
}
