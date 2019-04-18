<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserController extends Controller
{

    // public function __construct()
 //    {
 //     Carbon::setLocale(config('es_ES'));
 //        $this->data_now = Carbon::now();
 //    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function updateSubscription(Request $request, User $user)
    {
        $subscription = Carbon::create($user->end_subscription);
        $subscription->addMonths(1);
        $user->end_subscription = $subscription;
        $user->save();
        
        $users = User::all();
        return $users;
    }
    
}
