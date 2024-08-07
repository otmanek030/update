<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function admin_indx()
    {

            return view('admin.dashboard');

    }
    public function user_indx()
    {

            return view('user.dashboardU');

    }

    




}
