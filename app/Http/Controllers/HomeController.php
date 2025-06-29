<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Meeting;
use App\Models\Minutes;
use App\Models\Payments;
use App\Models\User;
use App\Models\Withdrawals;

class HomeController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        $user = Auth::user();
        $total_members = User::count();
        $total_payments = Payments::sum('amount');
        $total = Payments::where('member', $user->name)->sum('amount');
        $total_withdrawals = Withdrawals::sum('amount');
        $available_amount = $total_payments - $total_withdrawals;
        $minutes = Minutes::all();
        $meetings = Meeting::all();
        
        return view('dashboard', compact('user','minutes' , 'meetings','total' ,'total_members', 'total_payments', 'total_withdrawals', 'available_amount'));
    }

    public function home()
    {
        return view('home');
    }

    public function my_payments($id){
        $user = Auth::user();
        $member_payments = Payments::where('member', $user->name)->get();
        $total = Payments::where('member', $user->name)->sum('amount');
        return view('my_payments', compact('user','member_payments', 'total'));
    }

    public function profile($id){
        $user = Auth::user();
        $total_payments = Payments::where('member', $user->name)->sum('amount');

        return view('profile', compact('user','total_payments'));
    }
}
