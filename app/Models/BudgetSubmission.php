<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int|null $finance_officers_id
 * @property int|null $revenue_officer_id
 * @property string $budget_submission_name
 * @property int|null $nominal
 * @property int|null $assigned_payment_method
 * @property int|null $assigned_funding_source
 * @property string|null $path_file_submission
 * @property string $requirements_status
 * @property int $verification_status
 * @property string|null $path_file_requirements_status
 * @property int|null $is_archive
 * @property int $is_marked
 * @property int|null $is_return
 * @property int|null $digital_archive_id
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DigitalArchive|null $category_archive
 * @property-read \App\Models\User|null $finance_officer
 * @property-read \App\Models\FundingSource|null $funding_source
 * @property-read \App\Models\PaymentMethod|null $payment_method
 * @property-read \App\Models\User|null $revenue_officer
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereAssignedFundingSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereAssignedPaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereBudgetSubmissionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereDigitalArchiveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereFinanceOfficersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsMarked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereIsReturn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission wherePathFileRequirementsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission wherePathFileSubmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereRequirementsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereRevenueOfficerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BudgetSubmission whereVerificationStatus($value)
 * @mixin \Eloquent
 */
class BudgetSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'finance_officers_id',
        'revenue_officer_id',
        'budget_submission_name',
        'nominal',
        'assigned_payment_method',
        'assigned_funding_source',
        'path_file_submission',
        'requirements_status',
        'verification_status',
        'path_file_requirements_status',
        'is_archive',
        'is_marked',
        'is_return',
        'digital_archive_id',
        'message',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function finance_officer()
    {
        return $this->BelongsTo(User::class, 'finance_officers_id');
    }

    public function revenue_officer()
    {
        return $this->BelongsTo(User::class, 'revenue_officer_id');
    }

    public function payment_method()
    {
        return $this->BelongsTo(PaymentMethod::class, 'assigned_payment_method');
    }

    public function funding_source()
    {
        return $this->BelongsTo(FundingSource::class, 'assigned_funding_source');
    }

    public function category_archive()
    {
        return $this->belongsTo(DigitalArchive::class, 'digital_archive_id');
    }
}
