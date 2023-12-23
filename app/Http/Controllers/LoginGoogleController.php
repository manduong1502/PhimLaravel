<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
class LoginGoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
        
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();
         
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->route('pages.trangchu');
         
            }else{
                $token= Str::random(10);
                $newUser = User::create([
                    'username' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt($token),
                    'status' => 1,
                    'remember_token' => $token
                ]);
                if($newUser){
                    $newUser->assignRole('userfree');
                }
         
                Auth::login($newUser);
        
                return redirect()->route('pages.trangchu');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
