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
            if(Auth()->user()->role == 'admin'){
                return redirect('/courriers_admin');
            }
            if(Auth()->user()->role == 'dr'){
                return redirect('/courriers_dr');
            }
            if(Auth()->user()->role == 'dv'){
                return redirect('/courriers_dv');
            }
            if(Auth()->user()->role == 'bo'){
                return redirect('/courriers_bo');
            }
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
                $destinations = [
                    'admin' => 'courriers_admin.index',
                    'bo' => 'courriers_bo.index',
                    'dv' => 'courriers_dv.index',
                    'dr' => 'courriers_dr.index',
                ];

                return redirect(route($destinations[Auth()->user()->role]));
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
