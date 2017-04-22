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
    // 验证该字段数据是否存在
    public function check (Request $request, $name,$value) {
        $user = User::where($name, $value)->get();
        return $user;
    }
    // 用户注册
    public function signUp (Request $request) {
        $user = new User;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $user->$key = $value;
            if($key == 'password'){
                $user->$key = md5($value);
            }
        }
        $user->created_at = Carbon::now();
        $user->save();
        return $user;
    }
    //用户登录
    public function signIn (Request $request) {
        $user = User::where('email', $request->email)->where('password', md5($request->password))->get();
        return $user;
    }
    //修改用户资料
    public function edit (Request $request, $id) {
        $user = User::find($id);
        $req = $request->all();
        foreach ($req as $key => $value) {
            $user->$key = $value;
        }
        $user->updated_at = Carbon::now();
        $user->save();
        return $user;
    }
    public function paginate (Request $request) {
        
    }
    // 获取用户列表
    public function lists (Request $request) {
        /*只能进行一个条件查询*/
        $req = $request->all();
        if(count($req)>0){
            foreach($req as $key => $value){
                $users = User::where($key, $value)->paginate(10);
            }
        }else{
            $users = User::paginate(10);
        }
        
        return $users;
    }
    // 获取指定用户信息
    public function info (Request $request, $id) {
        $info = User::find($id);
        return $info;
    }
    // 删除指定用户
    public function delete (Request $request, $id) {
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
