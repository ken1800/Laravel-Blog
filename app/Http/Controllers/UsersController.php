<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
  public function index(){

    return view('users.index')->with('users',User::all());
  } 
public function edit(){

  return view ('users.edit')->with('user',auth()->user());

}
public function update(UpdateProfileRequest $requst){
$user=auth()->user();
$user->update([
'name'=>$requst->name,
'about'=>$requst->about
]);
session()->flash('success', 'Users Profile Updated successfully');
    return redirect()->back();
}
 
  public function makeAdmin(User $user){


    $user->role='admin';
    $user->save();
    
    session()->flash('success', 'User Made Admin successfully');
    return redirect(route('users.index'));
  } 


}
 