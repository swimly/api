<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //发送邮件
    public function sendMail () {
        Mail::send(array('html.view', 'text.view'), $data, $callback);
    }
    // 验证邮箱
    public function email (Request $request) {
        $user = User::where('email', $request->email)->get();
        return $user;
    }
    // 用户注册
    public function signUp (Request $request) {
        $callback = $request->callback;
        $user = new User;
        $req = $request->all();
        foreach ($req as $key => $value) {
            if ($key != 'callback') {
                $user->$key = $value;
            }
        }
        $user->created_at = Carbon::now();
        $user->save();
        return $callback.'('.$user.')';
    }
    //用户登录
    public function signIn (Request $request) {
        $user = User::where('email', $request->email)->where('password', md5($request->password))->get();
        return $user;
    }
    //修改用户资料
    public function edit (Request $request) {
        $callback = $request->callback;
        $user = User::find($request->id);
        $req = $request->all();
        foreach ($req as $key => $value) {
            if ($key == 'callback' or $key == 'id') {
            } else {
                $user->$key = $value;
            }
        }
        $user->updated_at = Carbon::now();
        $user->save();
        return $callback.'('.$user.')';
    }
    // 获取用户列表
    public function lists (Request $request) {
        $users = User::all();
        return $users;
    }
    // 获取指定用户信息
    public function info (Request $request) {
        $callback = $request->callback;
        $info = User::find($request->id);
        return $callback.'('.$info.')';
    }
    // 删除指定用户
    public function delete (Request $request) {
        $callback = $request->callback;
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return $callback.'('.$user.')';
    }
}
