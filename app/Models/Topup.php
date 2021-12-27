<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_number', 'amount_to_be_added', 'bank_account', 'date_of_transaction','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_of_transaction' => 'date',
    ];


     /**
     * 
     */
    public function getDateOfTransactionAttribute($value)
    {
        $value = Carbon::parse($value);
        return $value->toFormattedDateString();
    }

    /**
     * 
     */
    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value);
        return $value->toDayDateTimeString();
    }
}
