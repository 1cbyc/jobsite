<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    // Show all listings
    public function index()
    {
        // return view('blogs.index', [
        //     'Blogs' => Blog::latest()->paginate(6)
        // ]);

        return response()->json([
            'blogs' => Blog::all()
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $blog = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog['user_id'] = auth()->id();

        Blog::create($blog);
        return response()->json(['blog' => $blog], 200);
    }
}
