<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use App\Models\School;
use App\Models\Students;
use App\Models\Trainer;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        $redirectTo = request()->redirectTo;


        $get_user = User::where('email', $request->email)->first()->toArray();
        // echo "<pre>"; print_r($get_user); die();

        if (!empty($get_user)) {

            if (Hash::check($request->password, $get_user['password'])) {
                //$user_name = $get_user['first_name'].' '.$get_user['last_name'];
                Session::put('user_id', $get_user['id']);
                Session::put('email', $get_user['email']);
                Session::put('first_name', $get_user['first_name']);
                Session::put('last_name', $get_user['last_name']);
                Session::put('user_group', $get_user['group']);
                
                // echo "<pre>"; print_r($school); die();
                // $get_user['id']
                if($get_user['group'] == 1){

                    Session::put('admin_name', $get_user['name']);
                    Session::put('admin_image', $get_user['avatar']);

                    if ($redirectTo) {
                        return redirect($redirectTo);
                    } else {
                        return redirect('admin/dashboard');
                    }

                    // echo "Admin"; die();
                }else if($get_user['group'] == 2){

                    $school = School::where('user_id', $get_user['id'])->first()->toArray();
                    Session::put('school_name', $school['school_name']);
                    Session::put('school_id', $school['id']);
                    Session::put('school_image', $school['school_logo']);
                    if ($redirectTo) {
                        return redirect($redirectTo);
                    } else {
                        return redirect('school/dashboard');
                    }

                    // echo "School"; die();
                }else if($get_user['group'] == 3){
                    $trainer = Trainer::where('user_id', $get_user['id'])->first()->toArray();
                    Session::put('trainer_name', $trainer['trainer_name']);
                    Session::put('trainer_image', $trainer['image']);

                    Session::put('user_id', $trainer['user_id']);
                    Session::put('trainer_id', $trainer['id']);
                    return redirect('trainer/dashboard');
                }else{
                    $student = Students::where('user_id', $get_user['id'])->first()->toArray();
                    Session::put('student_name', $student['name']);
                    Session::put('student_image', $student['image']);

                    Session::put('student_id', $student['id']);
                    return redirect('student/dashboard');
                }

            }

            // echo "<pre>"; print_r(Session::); die();


        }


        // if ($redirectTo) {
        //     return redirect($redirectTo);
        // } else {
        //     return redirect('admin/dashboard');
        // }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
