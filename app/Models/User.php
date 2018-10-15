<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable{
  use AuthenticatableTrait;
  protected $table = 'users';
  protected $fillable = ['username', 'email', 'password', 'api_token'];
  protected $hidden = ['password', 'api_token'];

  public function post(){
    return $this->hasMany('App\Models\Post', 'user_id');
  }
}
