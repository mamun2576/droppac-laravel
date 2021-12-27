<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HandlingController extends Controller
{
    public function index()
   {
      return view('service.handling');
   }
}
