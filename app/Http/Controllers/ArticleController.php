<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function add (Request $request) {
        $article = new Article;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $article->$key = $value;
        }
        $article->time = Carbon::now();
        $article->save();
        return $article;
    }
    //修改项目
    public function edit (Request $request, $id) {
        $article = Article::find($id);
        $req = $request->all();
        foreach ($req as $key => $value) {
            $article->$key = $value;
        }
        $article->save();
        return $article;
    }
    public function paginate (Request $request) {
        
    }
    // 获取项目列表
    public function lists (Request $request) {
        /*只能进行一个条件查询*/
        $req = $request->all();
        if(count($req)>0){
            foreach($req as $key => $value){
                $articles = Article::where($key, $value)->paginate(5);
            }
        }else{
            $articles = Article::paginate(5);
        }
        
        return $articles;
    }
    // 获取单个项目信息
    public function info (Request $request,$id) {
        $callback = $request->callback;
        $info = Article::find($id);
        return $info;
    }
    // 删除指定项目
    public function delete (Request $request, $id) {
        $article = Article::find($id);
        $article->delete();
        return $article;
    }
}
