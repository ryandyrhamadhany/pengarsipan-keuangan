<?php 

namespace App\service\features\domain\verifikasi;

use App\Models\BudgetSubmission;
use App\service\features\domain\verifikasi\VerificationService;

class VerificationPPSPMService implements VerificationService
{
    public function verifySubmission(string $id): void
    {
        $budgetSubmission = BudgetSubmission::findOrFail($id);
        // Implementasi logika verifikasi pengajuan anggaran untuk PPSPM
        // Misalnya, periksa status pengajuan, validasi data, dll.
        if ($budgetSubmission->status === 'pending') {
            $budgetSubmission->status = 'verified_ppspm';
            $budgetSubmission->save();
        }
    }
}