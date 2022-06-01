<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        $uname = $request->get('uname');
        $passwd = $request->get('passwd');
        if ($uname == "admin" && $passwd == "admin123") {
            session()->put('uname', $uname);
            session()->put('passwd', $passwd);
            return redirect()->route('admin');
        } else {
            return back()->withErrors(['loginFail' => '(The username or password is incorrect.)'])->onlyInput('loginFail');
        }
    }
    public function adminPanel(Request $request)
    {
        $value = $request->input('user');
        if ($value == "add_user") {
            return redirect()->route('add_user');
        } else if ($value == "users_table") {
            return redirect()->route('table');
        } else {
            $request->session()->flush();
            return redirect()->route('/');
        }
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'username' => 'required|alpha|unique:users|max:50',
            'password' => 'required|min:6|max:12',
            'email' => 'required|email|unique:users',
            'age' => 'required|numeric|min:1|max:100',
            'gender' => 'required'
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->passwd = $request->password;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->save();

        $data = array(
            'name' => $user->username,
            'pass' => $user->passwd,
            'mail' => $user->email,
            'age' => $user->age,
            'gender' => $user->gender
        );
        $email = $user->email;
        Mail::send('mail', $data, function ($message) use ($email) {
            $message->to($email)->subject('User Added to Database');
            $message->from('syedzohaibhaider70@gmail.com', 'Admin');
        });
        return redirect()->route('table');
    }
    public function getData()
    {
        if (session()->get('uname') == 'admin' && session()->get('passwd') == 'admin123') {
            $users = User::all();
            return view('table', ['users' => $users]);
        } else {
            return redirect()->route('/');
        }
    }
    public function backToAdmin()
    {
        return redirect()->route('admin');
    }
    public function forgotPassword()
    {
        $data = array(
            'name' => 'admin',
            'pass' => 'admin123',
        );
        Mail::send('adminMail', $data, function ($message) {
            $message->to('helload606@gmail.com')->subject('Forgot Password?');
            $message->from('syedzohaibhaider70@gmail.com', 'Admin');
        });
        return view('forgot_passwd');
    }
}
