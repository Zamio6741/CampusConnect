<?php

namespace App\Http\Controllers;

class BusinessNotificationController extends Controller
{
    public function index()
    {
        return view('business.notifications.index');
    }
}