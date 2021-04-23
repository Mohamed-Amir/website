<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Consults;
use App\Http\Controllers\Manage\EmailsController;

class BlogsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allBlogs(){
        $blog = Blog::get();
        return view('Fronted.Blog.allBlogs',compact('blog'));
    }

    public function singleBlog($id)
    {
        $blog = Blog::where('id',$id)->first();
        if (!is_null($blog)) {
            return view('Fronted.Blog.singleBlog',compact('blog'));
        }
    }

}
