<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPageItem;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(3);
        $blog_page_item = BlogPageItem::where('id',1)->first();
        return view('frontend.blog', compact('posts', 'blog_page_item'));
    }

    public function detail($slug)
    {
        $post_single = Post::where('slug',$slug)->first();
        $post_single->total_view = $post_single->total_view+1;
        $post_single->update();
        return view('frontend.post', compact('post_single'));
    }
}
