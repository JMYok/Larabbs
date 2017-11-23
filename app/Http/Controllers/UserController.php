<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Handlers\ImageUploadHandler;

class UserController extends Controller
{
    public function show(User $user)
    {
    	return view('users.show',compact('user'));
    }

    public function update(UserRequest $request,User $user,ImageUploadHandler $uploader)
    {
    	$data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar,'avatar',$user->id,362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

    	$user->update($data);
    	return redirect()->route('users.show',compact('user'))->with('success','资料编辑成功');
    }

    public function edit(User $user)
    {
    	return view('users.edit',compact('user'));
    }
}
