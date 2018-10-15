<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{
  public function register(Request $request){
    $hasher = app()->make('hash');
    $username = $request->input('username');
    $email = $request->input('email');
    $password = $hasher->make($request->input('password'));
    $register = User::create([
      'username' => $username,
      'email' => $email,
      'password' => $password
    ]);
    if($register){
      $res['success'] = true;
      $res['message'] = 'Success registered!';
      return response()->json($res, 201);
    }else{
      $res['success'] = false;
      $res['message'] = 'Failed to register';
      return response()->json($res, 200);
    }
  }
  public function getUser(Request $request, $id){
    $user = User::where('id', $id)->get();
    if($user){
      $res['success'] = true;
      $res['get_user'] = $user;
      return response()->json($res, 200);
    }else{
      $res['success'] = false;
      $res['message'] = 'Cannot find user!';
      return response()->json($res, 200);
    }
  }
}
