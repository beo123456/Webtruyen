<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class CategoryController extends Controller
{
    public function Index(){
        $category = Category::orderBy('id','desc')->paginate(5);
        return view('admin.category.index',compact('category'));
    }

    public function Create(){
        return view('admin.category.create');
    }
    public function Store(request $request){
        $data = $request->validate(
            [
                "name"=>"required|unique:categories,name",
                "desc"=>"required|max:250"
            ],
            [
                'name.required'=>'Không được để trống tên thể loại truyện',
                'name.unique'=>'Đã tồn tại thể loại này',
                'desc.required'=>'Không được để trống phần mô tả',
                'desc.max'=>'Phần mô tả giới hạn 250 ký tự'
            ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str_slug($request->name);
        $category->desc = $request->desc;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('message','Bạn đã thêm thể loại mới thành công');
    }

    function Edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    function Update(request $request, $id){
        $data = $request->validate(
            [
                "name"=>"required|unique:categories,name,$id",
                "desc"=>"required|max:250"
            ]
            ,[
                'name.required'=>'Không được để trống tên thể loại truyện',
                'name.unique'=>'Đã tồn tại thể loại này',
                'desc.required'=>'Không được để trống phần mô tả',
                'desc.max'=>'Phần mô tả giới hạn 250 ký tự'
            ]);
            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = Str_slug($request->name);
            $category->desc = $request->desc;
            $category->status = $request->status;
            $category->save();
            return redirect()->back()->with('message','Bạn đã cập nhật thành công');
    }

    function Destroy($id){
        Category::destroy($id);
        return redirect()->back()->with('message','Bạn đã xóa thành công');
    }

}
