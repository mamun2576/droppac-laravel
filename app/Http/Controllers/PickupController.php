<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pickup;

class PickupController extends Controller
{
   public $pickup;

   public function __construct()
   {
       $this->pickup = new Pickup;
   }

   public function create()
   {
      return view('pickup.create',['pickup' => $this->pickup]);
   }
}
