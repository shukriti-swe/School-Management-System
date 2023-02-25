<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Students;
use App\Models\Trainer;

class BackendController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:edit articles')->only('testmiddleware');
    //     $this->middleware('role:admin|writer')->only('testmiddleware');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['total_school']=School::get()->count();
        $data['total_student']=Students::get()->count();
        $data['total_trainer']=Trainer::get()->count();
        $data['latest_ten_school']=School::orderBy('id','desc')->take(10)->get()->toArray();
   
        return view('backend.index',compact('data'));
    }
}
