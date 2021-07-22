<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\{Story,Category,Chapter};
class StoryController extends Controller
{
    public function Index(){
        $story = Story::orderBy('id','desc')->paginate(5);
        $category = Category::all();
        return view('admin.story.index',compact('story','category'));
    }
/////create
    public function Create(){
        $category = Category::all();
        return view('admin.story.create',compact('category'));
    }
/////store
    public function Store(request $request){
        $data = $request->validate(
            [
                "name"=>"required|unique:stories,name",
                "desc"=>"required|max:1000",
                "author"=>'required'
            ],
            [
                'name.required'=>'Không được để trống tên truyện',
                'name.unique'=>'Đã tồn tại truyện này',
                'desc.required'=>'Không được để trống phần mô tả',
                'desc.max'=>'Phần mô tả giới hạn 1000 ký tự',
                'author.required'=>'Không được để trống tên tác giả'
            ]);

        $story = new Story();
        $story->name = $request->name;
        $story->slug = Str_slug($request->name);
        $story->desc = $request->desc;
        $story->author = $request->author;
        $story->category_id = $request->category_id;
        $story->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/image',$file_name);
            $story->image = $file_name;
        }else{
            $story->image = '';
        }

        $story->save();
        return redirect()->back()->with('message','Bạn đã thêm truyện mới thành công');
    }
////edit
    function Edit($id){
        $story = Story::find($id);
        $category = Category::all();
        return view('admin.story.edit',compact('story','category'));
    }
    /////update
    function Update(request $request, $id){
        $data = $request->validate(
            [
                "name"=>"required|unique:stories,name,$id",
                "desc"=>"required|max:1000",
                "author"=>'required'
            ],
            [
                'name.required'=>'Không được để trống tên truyện',
                'name.unique'=>'Đã tồn tại truyện này',
                'desc.required'=>'Không được để trống phần mô tả',
                'desc.max'=>'Phần mô tả giới hạn 1000 ký tự',
                'author.required'=>'Không được để trống tên tác giả'

            ]);

        $story = Story::find($id);
        $story->name = $request->name;
        $story->slug = Str_slug($request->name);
        $story->desc = $request->desc;
        $story->author = $request->author;
        $story->category_id = $request->category_id;
        $story->status = $request->status;

        // nếu tồn tại file thì lấy luôn
        if($request->hasFile('image')){
            $file = $request->image;
            $file_name = str_slug($request->name).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/image',$file_name);
            $story->image = $file_name;
        }

        $story->save();
        return redirect()->back()->with('message','Bạn đã cập nhật truyện thành công');
    }
////destroy
    function Destroy($id){
        Story::destroy($id);
        return redirect()->back()->with('message','Bạn đã xóa thành công');
    }
    
    ////chapterlist
    function ChapterList($id){
        // $story = Story::all();
        $chapter = Chapter::where('story_id',$id)->paginate(10);
        return view('admin.chapter.chapter_of_story',compact('chapter'));
    }

    ///storyofcategory . lấy dl có story['category_id'] == category['id']
    function StoryOfCategory($id){
        $category = Category::find($id);
        $story_of_category = Story::where('category_id',$id)->paginate(10);
        return view('admin.story.story_of_category',compact('story_of_category','category'));
    }
}
