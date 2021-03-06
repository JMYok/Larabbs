<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;


class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic)
    {
    	//读取分类ID关联的话题并按20条分页
    	$topics = $topic->withOrder($request->order)->where('category_id',$category->id)->paginate(20);

    	return view('topics.index',compact('topics','category'));
    }
}
