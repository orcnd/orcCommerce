<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    function login(Request $request)
    {
        if (Auth::check()) {
            return $this->_redirectBasedRole(Auth::user()->role);
        }
        if ($request->isMethod('POST')) {
            $request->validate(
                [
                'email' => 'required|email',
                'password' => 'required|string|min:4'
                ]
            );

            if(Auth::attempt($request->only(['email','password']))) {
                return $this->_redirectBasedRole(Auth::user()->role);
            }
            return redirect()->back()->withErrors(
                [
                'email' => 'Invalid email or password'
                ]
            )->withInput();
        
        }
        return view('guest.login');
    }

    /**
     * Redirect user based on their role to their home page
     * 
     * @param string $role role of user 
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function _redirectBasedRole(string $role)
    {
        if ($role==='admin') {
            return redirect(
                route('manage.home')
            );
        }
        return redirect(
            route('home')
        );
    }

    /**
     * Register 
     * 
     * @param \Illuminate\Http\Request $r reqs
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function register(Request $r)
    {
        if (Auth::check()) {
            return $this->_redirectBasedRole(Auth::user()->role);
        }

        if ($r->isMethod('POST')) {
            $r->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:3|confirmed',
                ]
            );
            try {
                $user=\App\Models\User::create(
                    [
                        'name' => $r->name,
                        'email' => $r->email,
                        'password' => bcrypt($r->password),
                        'role' => 'user',
                    ]
                );
            }catch(\Exception $e){
                Log::error($e->getMessage());
                return redirect()->back()->withErrors(
                    [
                    'email' => 'Something went wrong please contact with an admin'
                    ]
                )->withInput();
            }
            Auth::login($user);
            return $this->_redirectBasedRole('user');
        }
        return view('guest.register');
    }

    /**
     * Logout 
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
