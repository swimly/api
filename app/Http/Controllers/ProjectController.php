<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    // 添加项目
    public function add (Request $request) {
        $callback = $request->callback;
        $project = new Project;
        $req = $request->all();
        foreach ($req as $key => $value) {
            if ($key != 'callback') {
                $project->$key = $value;
            }
        }
        $project->time = Carbon::now();
        $project->save();
        return $callback.'('.$project.')';
    }
    //修改项目
    public function edit (Request $request, $id) {
        $project = Project::find($id);
        $req = $request->all();
        foreach ($req as $key => $value) {
            $project->$key = $value;
        }
        $project->save();
        return $project;
    }
    public function paginate (Request $request) {
        
    }
    // 获取项目列表
    public function lists (Request $request) {
        /*只能进行一个条件查询*/
        $req = $request->all();
        if(count($req)>0){
            foreach($req as $key => $value){
                $projects = Project::where($key, $value)->paginate(5);
            }
        }else{
            $projects = Project::paginate(5);
        }
        
        return $projects;
    }
    // 获取单个项目信息
    public function info (Request $request,$id) {
        $callback = $request->callback;
        $info = Project::find($id);
        return $info;
    }
    // 删除指定项目
    public function delete (Request $request, $id) {
        $project = Project::find($id);
        $project->delete();
        return $project;
    }
}
