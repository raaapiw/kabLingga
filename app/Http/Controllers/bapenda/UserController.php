<?php

namespace App\Http\Controllers\bapenda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Carbon\Carbon;
use Storage;
use App\Client;
use App\Shipping;
use App\Report;

class UserController extends Controller
{
    //
    public function dashboard(){
        $clients = Client::all();
        $shippings = Shipping::all();
        $today = Carbon::now();     
        
        $month1 = Carbon::now()->subMonthNoOverflow(1);
        $month2 = Carbon::now()->subMonthNoOverflow(2);
        $month3 = Carbon::now()->subMonthNoOverflow(3);
        $month4 = Carbon::now()->subMonthNoOverflow(4);
        $month5 = Carbon::now()->subMonthNoOverflow(5);

        $shipping5 = Shipping::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(5)->startOfMonth(),Carbon::now()->subMonthNoOverflow(5)->endOfMonth()])->get()->count();
        $shipping4 = Shipping::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(4)->startOfMonth(),Carbon::now()->subMonthNoOverflow(4)->endOfMonth()])->get()->count();
        $shipping3 = Shipping::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(3)->startOfMonth(),Carbon::now()->subMonthNoOverflow(3)->endOfMonth()])->get()->count();
        $shipping2 = Shipping::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(2)->startOfMonth(),Carbon::now()->subMonthNoOverflow(2)->endOfMonth()])->get()->count();
        $shipping1 = Shipping::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(1)->startOfMonth(),Carbon::now()->subMonthNoOverflow(1)->endOfMonth()])->get()->count();
        $shipping0 = Shipping::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->get()->count();
        
        // $regis5 = Registration::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(5)->startOfMonth(),Carbon::now()->subMonthNoOverflow(5)->endOfMonth()])->get()->count();
        // $regis4 = Registration::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(4)->startOfMonth(),Carbon::now()->subMonthNoOverflow(4)->endOfMonth()])->get()->count();
        // $regis3 = Registration::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(3)->startOfMonth(),Carbon::now()->subMonthNoOverflow(3)->endOfMonth()])->get()->count();
        // $regis2 = Registration::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(2)->startOfMonth(),Carbon::now()->subMonthNoOverflow(2)->endOfMonth()])->get()->count();
        // $regis1 = Registration::whereBetween('created_at',[Carbon::now()->subMonthNoOverflow(1)->startOfMonth(),Carbon::now()->subMonthNoOverflow(1)->endOfMonth()])->get()->count();
        // $regis0 = Registration::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->get()->count();
        
        // $patient2 = Patient::whereBetween('created_at',Carbon::now()->subMonthNoOverflow(2)->startOfMonth(),Carbon::now()->subMonthNoOverflow(2)->endOfMonth())->get();
        // $patient3 = Patient::whereBetween('created_at',Carbon::now()->subMonthNoOverflow(3)->startOfMonth(),Carbon::now()->subMonthNoOverflow(3)->endOfMonth())->get();
        // $patient4 = Patient::whereBetween('created_at',Carbon::now()->subMonthNoOverflow(4)->startOfMonth(),Carbon::now()->subMonthNoOverflow(4)->endOfMonth())->get();
        // $patient5 = Patient::whereBetween('created_at',Carbon::now()->subMonthNoOverflow(5)->startOfMonth(),Carbon::now()->subMonthNoOverflow(5)->endOfMonth())->get();


        return view('pages.bapenda.dashboard', compact('clients', 'shippings', 'shipping0', 'shipping1', 'shipping2', 'shipping3', 'shipping4', 'shipping5', 'month0', 'month1', 'month2', 'month3', 'month4', 'month5', 'today'));
    }
}
