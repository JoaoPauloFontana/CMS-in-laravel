<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if($user){
            return view('admin.profile.index', [
                'user' => $user
            ]);
        }

        return redirect()->route('admin');

    }
}