<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function index()
    {
        return view('kepala_kantor.dashboard');
    }

    public function report()
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $submission = BudgetSubmission::with('user')->whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('keuangan.report.report', compact('submission'));
        }
        $submission = BudgetSubmission::with('user')->paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.report', compact('submission'));
    }
}
