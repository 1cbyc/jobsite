<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            'blogs' => $this->blog->paginate(10)
        ]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validatedData['user_id'] = Auth::id();

        $blog = $this->blog->create($validatedData);

        return response()->json(['blog' => $blog], 201); 
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog); 

        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog); 

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($validatedData);

        return response()->json(['blog' => $blog], 200);
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog); 

        $blog->delete();

        return response()->json(['message' => 'Blog post deleted'], 204);
    }
}
