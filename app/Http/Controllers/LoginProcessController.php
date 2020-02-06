<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function login()
    {
        If (Auth::check()) {
            return redirect('/courriers');
        }
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:25',
            'password' => 'required|max:25',
        ]);

        if ($validator->fails()) {
            // return to login page with errors
            return redirect('login')
                ->withInput()
                ->withErrors($validator);
        } else {
            If (Auth::attempt($request->all(['username', 'password']))) {
                // authentication success, enters home page
                return redirect('courriers')->with('success', 'Login success, welcome again!');
            } else {
                // authentication fail, back to login page with errors
                return redirect('login')
                    ->withErrors('Incorrect login details');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @return RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
