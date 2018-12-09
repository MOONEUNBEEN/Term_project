<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'nic' => 'required',
            'phone' => 'required|max:13',
            'zipcode' => 'required|max:5',
            'addr1' => 'required',
            'addr2' => 'required'
        ]);

        $confirmCode = str_random(60);
        //return $confirmCode;

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'nic' => $request->input('nic'),
            'phone' => $request->input('phone'),
            'zipcode' => $request->input('zipcode'),
            'addr1' => $request->input('addr1'),
            'addr2' => $request->input('addr2'),
            'confirm_code' => $confirmCode,
        ]);

        //\Log::debug('confirm_code' . $user->confirm_code);

        $user->confirm_code = $confirmCode;

        \Mail::send('emails.auth.confirm', compact('user'), function ($message) use ($user) {
            $message->to($user->email);
            $message->subject(
                "회원 가입을 확인해 주세요"
            );
        });

        //event(new \App\Events\UserCreated($user));

        /* auth()->login($user);
        flash(auth()->user()->name . '님, 환영합니다'); */

        flash('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인하시고 로그인해 주세요');
        
        return redirect('/');

        /* return $this->responseCreated('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인하시고 로그인해 주세요'); */
    }

    public function responseCreated($message) {
        flash($message);

        return redirect('/');
    }

    public function confirm($code) {
        $user = User::whereConfirmCode($code)->first();

        if (! $user) {
            flash('URL이 정확하지 않습니다');

            return redirect('/');
        }

        $user->activated = 1;
        $user->confirm_code = null;
        $user->save();

        auth()->login($user);
        flash(auth()->user()->name . '님, 환영합니다. 가입 확인되었습니다');

        return redirect('/');
    }

}
