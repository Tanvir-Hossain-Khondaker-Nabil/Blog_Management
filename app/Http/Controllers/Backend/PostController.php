<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\PhotoUploadController;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','sub_category','tag','user')->latest()->paginate(15);
        return view ('backend.modules.posts.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->pluck('name','id');
        $sub_categories = SubCategory::where('status',1)->pluck('name','id');
        $tags = Tag::where('status',1)->pluck('name','id');
        return view ('backend.modules.posts.create', compact('categories','sub_categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, [
            'title'=>'required|min:3|max:255',
            'slug'=>'required|min:3|max:255|unique:posts',
            'status'=>'required|numeric',
            'is_approved'=>'required|numeric',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'tag_ids'=>'required',
            'photo'=>'required',
            'description'=>'required|min:20',
        ]);

        $post_data = $request->except(['tag_ids','slug','photo','is_approved']);
        $post_data['slug'] =  str::slug($request->input('slug'));
        $post_data['user_id'] =  Auth::user()->id;
        $post_data['is_approved'] = 1;


        $file = " ";   
         
        if($file = $request->file('photo')){
            $name = str::slug($request->input('slug')).'.'.$file->getClientOriginalExtension();
            $post_data['photo'] = $file->move('dist/img/post/original/',$name);
        }

        // if($file = $request->file('photo')){
            
        //     $name = str::slug($request->input('slug'));
        //     $hight = 300;
        //     $width = 1000;
        //     $thumb_hight = 150;
        //     $thumb_width = 300;
        //     $path = 'dist/img/post/original/';
        //     $thumb_path = 'dist/img/post/thumbnail/';

        //     $post_data['photo'] = PhotoUploadController::imageUpload($name,$hight,$width,$path,$file);
        //     PhotoUploadController::imageUpload($name,$thumb_hight,$thumb_width,$thumb_path,$file);
        // }

        $post = Post::create($post_data);
        $post->tag()->attach($request->input('tag_ids'));


        session()->flash('msg','Create Successfully');    
        session()->flash('cls','success');
            
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['category','sub_category','user','tag']);
        return view ('backend.modules.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::where('status',1)->pluck('name','id');
        $sub_categories = SubCategory::where('status',1)->pluck('name','id');
        $tags = Tag::where('status',1)->pluck('name','id');
        $selected_tags = DB::table('post_tag')->where('post_id',$post->id)->pluck('tag_id','id')->toArray();
        return view ('backend.modules.posts.create', compact('post','categories','sub_categories','tags','selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        // $this->validate($request, [
        //     'title'=>'required|min:3|max:255',
        //     'slug'=>'required|min:3|max:255|unique:post,slug,'.$post->id,
        //     'status'=>'required|numeric',
        //     'is_approved'=>'required|numeric',
        //     'category_id'=>'required',
        //     'sub_category_id'=>'required',
        //     'tag_ids'=>'required',
        //     // 'photo'=>'required',
        //     'description'=>'required|min:20',
        // ]);

        $post_data = $request->except(['tag_ids','slug','photo','is_approved']);
        $post_data['slug'] =  str::slug($request->input('slug'));
        $post_data['user_id'] =  Auth::user()->id;
        $post_data['is_approved'] = 1;


        $file = " ";
        $deleteOldImage = $post->photo;
         
        if($file = $request->file('photo')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $name = str::slug($request->input('slug')).'.'.$file->getClientOriginalExtension();
            $post_data['photo'] = $file->move('dist/img/post/original/',$name);
        }
        else{            
            $post_data['photo'] = $post->photo;
        }

        $post->update($post_data);
        $post->tag()->sync($request->input('tag_ids'));


        session()->flash('msg','update Successfully');    
        session()->flash('cls','warning');
            
        return redirect()->route('post.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deleteOldImage = $post->photo;
        if(file_exists($deleteOldImage)){
            unlink($deleteOldImage);
        }

        $post->delete();
        session()->flash('msg','Delete Successfully');
        session()->flash('cls','error');
        return redirect()->route('post.index');
    }
}
