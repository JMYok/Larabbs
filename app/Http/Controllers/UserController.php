<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
    	return view('users.show',compact('user'));
    }

    public function update(UserRequest $request,User $user)
    {
    	$user->update($request->all());
    	return redirect()->route('users.show',compact('user'))->with('success','资料编辑成功');
    }

    public function edit(User $user)
    {
    	return view('users.edit',compact('user'));
    }
}
