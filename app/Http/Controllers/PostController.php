<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        try{
            $getAllPost = Post::orderBy('id','desc')->get();
    
            return response()->json([
                'value'  => $getAllPost,
                'status' => 'success',
                'message' => 'Post Listed Successfully !!'
                ]);
    
        }catch (\Exception $e){
            return [
            'value'  => [],
            'status' => 'error',
            'message'   => $e->getMessage()
    
            ];
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            $data = [
                'image' => $request->image,
                'title' => $request->title,
                'description' => $request->description,
            ];

            $postData = Post::create($data);

            return response()->json([
                'value'  => $postData,
                'status' => 'success',
                'message' => 'Post Added Successfully !!'
            ]);
        }catch (\Exception $e){
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()

            ];
        }
    }

    public function show(Request $request)
    {
        try{
            $postID = $request->id;
            $getPostData = Post::find($postID);
            return response()->json([
                'value'  => $getPostData,
                'status' => 'success',
                'message' => 'Post details !!'
            ]);

        }catch (\Exception $e){
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()

            ];
        }
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Request $request)
    {
        try{
            $removePost = $request->id;
            $getAllPost = Post::find($removePost);
            if($getAllPost){
                $getAllPost->delete();
            }
            return response()->json([
                'value'  => [],
                'status' => 'success',
                'message' => 'Post Removed Successfully !!'
            ]);

        }catch (\Exception $e){
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()

            ];
        }
    }
}
