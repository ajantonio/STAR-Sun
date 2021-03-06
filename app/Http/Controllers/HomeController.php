<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Entities\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('vendor.adminlte.login', [
            'not_user_account' => false
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        //$2y$10$8ItAEcy7m0kukglq2KIW5.tXOF2HJpECTAScIf2BSV5fg5oh7IJGe

        // dd(Hash::make($request->get('password')));

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        } else {
            return view('vendor.adminlte.login', [
                'not_user_account' => true
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/logout');
    }

    public function dummyUser()
    {
        $user = User::where('username', 'ajantonio')
            ->first();
        if (!$user) {
            $user = User::create([
                'id' => (string) Str::uuid(),
                'username' => 'ajantonio',
                'id_number' => '2018-100107',
                'type' => 'Student',
                'name' => 'Adrian John Antonio',
                'first_name' => 'Adrian John',
                'middle_name' => 'G',
                'last_name' => 'Antonio',
                'email' => 'aantonio@student.apc.edu.ph',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('aj12345'),
                'domain' => 'default'
            ]);
        }

        return $user;
    }

    public function dummyAdmin()
    {
        $user = User::where('username', 'jsmith')
            ->first();
        if (!$user) {
            $user = User::create([
                'id' => (string) Str::uuid(),
                'username' => 'jsmith',
                'id_number' => '2020-100001',
                'type' => 'Employee',
                'name' => 'John Smith',
                'first_name' => 'John',
                'middle_name' => 'A',
                'last_name' => 'Smith',
                'email' => 'johns@apc.edu.ph',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password123'),
                'domain' => 'default'
            ]);
        }

        return $user;
    }

    public function dummyFaculty()
    {
        $user = User::where('username', 'rwgardon')
            ->first();
        if (!$user) {
            $user = User::create([
                'id' => (string) Str::uuid(),
                'username' => 'rwgardon',
                'id_number' => '2020-100001',
                'type' => 'Employee',
                'name' => 'Roselle Wednesday Gardon',
                'first_name' => 'Roselle Wednesday',
                'middle_name' => 'A',
                'last_name' => 'Gardon',
                'email' => 'rwgardon@apc.edu.ph',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password123'),
                'domain' => 'default'
            ]);
        }

        return $user;
    }
    

    public function dummyStudOrg()
    {
        $user = User::where('username', 'jpcsAPC')
            ->first();
        if (!$user) {
            $user = User::create([
                'id' => (string) Str::uuid(),
                'username' => 'jpcsAPC',
                'id_number' => '2012-100001',
                'type' => 'Student Organization',
                'name' => 'Junior Philippine Computer Society APC',
                'first_name' => 'Junior Philippine',
                'middle_name' => 'Computer',
                'last_name' => 'Society',
                'email' => 'jpcs@apc.edu.ph',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password123'),
                'domain' => 'default'
            ]);
        }

        return $user;
    }
}
