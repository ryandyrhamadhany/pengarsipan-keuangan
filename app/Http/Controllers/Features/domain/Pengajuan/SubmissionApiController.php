<?php

namespace App\Http\Controllers\Features\domain\Pengajuan;

use App\Http\Controllers\Controller;
use App\service\features\domain\pengajuan\SubmissionService;
use Auth;
use Illuminate\Http\Request;

class SubmissionApiController extends Controller
{
    public function __construct(
        protected SubmissionService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'file' => 'mimes:pdf|max:51200|nullable',
            'payment_method' => 'required|integer',
            'funding_source' => 'required|integer',
        ]);

        // $submit_service = new SubmissionService();
        $this->service->createSubmission($user, $request);

        return redirect()->route('user.monitoring')->with('success', 'Berhasil Mengirim Pengajuan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

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
}
