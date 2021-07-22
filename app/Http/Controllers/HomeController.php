<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\{Story,Category,Chapter};
use Carbon;
class HomeController extends Controller
{
    // index
    public function Index(){
        $all_category = Category::where('status',1)->get();
        $story = Story::orderBy('id','desc')->take(10)->get();
        $featured = Story::where('status',1)->take(6)->get(); /// truyện nổi bật lấy theo status = 1
        return view('pages.index',compact('story','all_category','featured'));
    }
    // detail_story
    public function DetailStory($slug){
        $story = Story::where('slug',$slug)->get();
        foreach($story as $value){
            $chapter = Chapter::orderBy('id','asc')->where('status',1)->where('story_id',$value['id'])->paginate(10);
        }
        $all_category = Category::where('status',1)->get();
        
        return view('pages.detail_story',compact('story','all_category','chapter'));
    }
    ///category
    public function Category($slug){
        $all_category = Category::where('status',1)->get();
        $category = Category::where('slug',$slug)->get();
        $story = Story::orderBy('id','desc')->get();
        return view('pages.story_category',compact('category','story','all_category'));

    }

    ///chapter detail
    public function ChapterDetail($slug){
        $all_category = Category::where('status',1)->get();
        $story = Story::all(); /// lấy story có status 
        $all_chapter = Chapter::where('status',1)->get(); /// lấy tất cả chapter
        $chapter = Chapter::where('slug',$slug)->where('status',1)->get(); // lấy chapter có slug = slug trên url
        return view('pages.chapter',compact('chapter','all_category','story','all_chapter'));
    }
    
    /// search
    public function Search(request $request){
        $keyword = $request->keyword;
        $story = Story::all();
        $all_category = Category::where('status',1)->get();
        $result = Story::where('name','like','%'.$keyword.'%')->orWhere('author','like','%'.$keyword.'%')->get();
        return view('pages.search',compact('story','all_category','result','keyword'));
    }
  
}
