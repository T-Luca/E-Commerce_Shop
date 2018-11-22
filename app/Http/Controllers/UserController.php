<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
class UserController extends Controller
{
    /*public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('product.index');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('product.index');
        }
        return redirect()->back();
    }*/

    public function getLogout() {
        Auth::logout();
        return redirect()->back();
    }

    public function index(){
        //fetch all users data
        $users = User::orderBy('id')->get();

        //pass users data to view and load list view
        return view('user.index', ['users' => $users]);
    }

    public function add(){
        //load form view
        return view('user.add');
    }

    public function insert(Request $request){
        //validate user data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        //store status message
        Session::flash('success_msg', 'User added successfully!');

        return redirect()->route('user.index');
    }

    public function edit($id){
        //get user data by id
        $user = User::find($id);

        //load form view
        return view('user.edit', ['user' => $user]);
    }

    public function update($id, Request $request){
        //validate user data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        //get user data
        $userData = $request->all();

        //update user data
        User::find($id)->update($userData);

        //store status message
        Session::flash('success_msg', 'User updated successfully!');

        return redirect()->route('user.index');
    }

    public function delete($id){
        //update user data
        User::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'User deleted successfully!');

        return redirect()->route('user.index');
    }
}
