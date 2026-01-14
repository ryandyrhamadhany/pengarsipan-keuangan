<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-dashboard');
    }

    public function input_archive(Request $request)
    {
        $cabinets = Cabinet::all();

        // return view('admin.archive.archive-rack', compact('raks', 'categories'));
        return view('admin.input_archive.cabinet.cabinet', compact('cabinets'));
    }

    public function environment()
    {
        $payment_method = PaymentMethod::all();
        $funding_source = FundingSource::all();
        return view('admin.setting_environment.setting_environment', compact('payment_method', 'funding_source'));
    }

    // public function kelola_user()
    // {
    //     $users = User::all();
    //     return view('admin.kelola_user.kelola_user', compact('users'));
    // }
}
