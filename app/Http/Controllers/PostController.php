<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
  public function index(){
    $post = Post::all();
    return response()->json($post, 200);
  }
  public function store(Request $request){
    $this->validate($request,[
      'title' => 'required',
      'body' => 'required'
    ]);
    $post = Post::create($request->all());
    return response()->json($post, 201);
  }
  public function show($id){
    $post = Post::find($id);
    if(! $post){
      return response()->json([
        'message' => 'Post not found'
      ], 200);
    }
    return response()->json($post, 200);
  }
  public function update(Request $request, $id){
    $post = Post::find($id);
    if($post){
      $post->update($request->all());
      return response()->json([
        'message' => 'Post has been updated',
        'post' => $post
      ], 201);
    }
    return response()->json([
      'message' => 'Post not found'
    ], 404);
  }
  public function delete($id){
    $post = Post::find($id);
    if($post){
      $post->delete();
      return response()->json([
        'message' => 'Post has been deleted'
      ], 201);
    }
    return response()->json([
      'message' => 'Post not found'
    ], 404);
  }
}
