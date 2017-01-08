<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth",["only" => ["destroy","setAdmin","index"]]);
        $this->middleware('auth', ["only" => ["show","deleteCurrent"]]);
    }

    public function index()
    {
        $users = User::all();
        return view("users.index") -> with("users", $users);
    }

    public function setAdmin(User $user, $status)
    {
        if(Auth::user()->admin) {
            if ($status == "1")
                $user->admin = 1;
            else
                $user->admin = 0;
            $user->save();
            return redirect("users");
        }
        Session::flash('message', "You're not ADMIN! So don't try to pretend.");
        return redirect()->back();
    }
    public function destroy(User $user)
    {
        if(Auth::user()->admin)
        {
            $user->delete();
            Session::flash('message', "User deleted! Bye Bye");
            return redirect()->back();
        }
        elseif (Auth::user() == $user)
        {
            $user->delete();
            Session::flash('message', "User deleted! Bye Bye");
            return Redirect::to('/');
        }
        Session::flash('message', "You're not ADMIN! You can only delete yourself.");
        return redirect()->back();
    }
}
