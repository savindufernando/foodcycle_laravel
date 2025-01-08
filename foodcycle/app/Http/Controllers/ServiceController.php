<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Show the service page with buttons for Storage and Delivery.
     */
    public function index()
    {
        return view('service.index'); 
    }

    /**
     * Show the storage page.
     */
    public function storage()
    {
        return view('service.storage');
    }

    /**
     * Show the delivery page.
     */
    public function delivery()
    {
        return view('service.delivery'); 
    }
}