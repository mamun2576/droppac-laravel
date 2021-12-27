<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    //
    public function index(){
        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('package.index',['packages'=>$packages]);
    }

    public function domestic(){
        $packages = Package::where('uuid','null')->orderBy('created_at', 'desc')->get();
        return view('package.index',['packages'=>$packages]);
    }

    public function international(){
        $packages = Package::where('uuid','!=','null')->orderBy('created_at', 'desc')->get();
        return view('package.index',['packages'=>$packages]);
    }
}
