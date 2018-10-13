<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
  public function index(){
    return Post::all();
  }
  public function store(Request $request){
    $this->validate($request,[
      'title' => 'required',
      'body' => 'required'
    ]);
    return Post::create($request->all());
  }
  public function show($id){
    $post = Post::find($id);
    if(! $post){
      return response()->json([
        'message' => 'Post not found'
      ]);
    }
    return $post;
  }
  public function update(Request $request, $id){
    $post = Post::find($id);
    if($post){
      $post->update($request->all());
      return response()->json([
        'message' => 'Post has been updated',
        'post' => $post
      ]);
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
      ]);
    }
  }
}
