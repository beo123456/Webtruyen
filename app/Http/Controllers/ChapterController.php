<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\{Chapter,Story,Category};

class ChapterController extends Controller
{
    public function Index(){
        $chapter = Chapter::orderBy('id','desc')->paginate(10);
        $category = Category::all();
        return view('admin.chapter.index',compact('chapter','category'));
    }

    public function Create(){
        $story = Story::all();
        return view('admin.chapter.create',compact('story'));
    }

    public function Store(request $request){
        $data = $request->validate(
            [
                "title"=>"required|unique:chapters,title",
                "content"=>"required|max:30000"
            ],
            [
                'title.required'=>'Không được để trống tiêu dề',
                'title.unique'=>'Chapter này đã tồn tại',
                'content.required'=>'Không được để trống nội dung chapter',
                'content.max' => 'Bạn đã vượt quá 30.000 ký tự trong 1 chapter'
            ]);

        $chapter = new Chapter();
        $chapter->title = $request->title;
        $chapter->content = $request->content;
        $chapter->slug = str_slug($request->title);
        $chapter->story_id = $request->story_id;
        $chapter->status = $request->status;

        $chapter->save();
        return redirect()->back()->with('message','Bạn đã thêm chapter mới thành công');
    }

    function Edit($id){
        $chapter = Chapter::find($id);
        $story = Story::all();
        return view('admin.chapter.edit',compact('story','chapter'));
    }
    
    function Update(request $request, $id){
        $data = $request->validate(
            [
                "title"=>"required|unique:chapters,title,$id",
                "content"=>"required|max:30000"
            ],
            [
                'title.required'=>'Không được để trống tiêu dề',
                'title.unique'=>'Chapter này đã tồn tại',
                'content.required'=>'Không được để trống nội dung chapter',
                'content.max' => 'Bạn đã vượt quá 30.000 ký tự trong 1 chapter'
            ]);

        $chapter = Chapter::find($id);
        $chapter->title = $request->title;
        $chapter->content = $request->content;
        $chapter->slug = str_slug($request->title);
        $chapter->story_id = $request->story_id;
        $chapter->status = $request->status;

        $chapter->save();
        return redirect()->back()->with('message','Bạn đã cập nhật chapter thành công');
    }

    function Destroy($id){
        Chapter::destroy($id);
        return redirect()->back()->with('message','Bạn đã xóa chapter thành công');
    }
}
