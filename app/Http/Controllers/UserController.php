<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
 
class UserController extends Controller
{
    public function get(Request $request)
    {
      $user_id = $request->get(4, 0);
      $user = User::find($user_id);
      dd( $user);
    }
}