<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()    
    {        
        $posts = Post::with('category','user')->where('is_approved',1)->where('status',1)->latest()->paginate(3);

        $recent_posts = Post::with('category')->where('is_approved',1)->where('status',1)->latest()->take(10)->get();
        $categories = Category::where('status',1)->orderBy('order_by')->paginate(9);
        $subcategories = SubCategory::where('status', 1)->orderBy('order_by')->paginate(20);
        
        return view ('frontend.modules.index',compact('categories','subcategories','posts','recent_posts'));
    }

    public function search(request $req)
    {        
        $posts = Post::with('category','user')
        ->where('is_approved',1)
        ->where('status',1)
        ->where('title','like','%'.$req->input('keyword').'%')
        ->latest()
        ->paginate(3);

        $recent_posts = Post::with('category')->where('is_approved',1)->where('status',1)->latest()->take(10)->get();
        $categories = Category::where('status',1)->orderBy('order_by')->paginate(9);
        $subcategories = SubCategory::where('status', 1)->orderBy('order_by')->paginate(20);
        
        return view ('frontend.modules.index',compact('categories','subcategories','posts','recent_posts'));
    }

    public function post($slug)    
    {
               
        $posts = Post::with('comment','comment.user','comment.reply','category','sub_category','tag','user')->where('slug',$slug)->where('is_approved',1)->where('status',1)->first();
        $count = Comment::where('post_id',$posts->id)->count();
        
        $recent_posts = Post::with('category')->where('is_approved',1)->where('status',1)->latest()->take(10)->get();
        $categories = Category::where('status',1)->orderBy('order_by')->paginate(9);
        $subcategories = SubCategory::where('status', 1)->orderBy('order_by')->paginate(20);

        $comments = Comment::where('post_id',$posts->id)->where('status', 1)->get();
        
        return view ('frontend.modules.post',compact('categories','subcategories','posts','recent_posts','count','comments'));
    }

    public function contact_us()    
    {
               
        $categories = Category::where('status',1)->orderBy('order_by')->paginate(9);
        
        return view ('frontend.modules.contact-us',compact('categories'));
    }
}
