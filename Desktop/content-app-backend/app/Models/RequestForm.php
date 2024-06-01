<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    use HasFactory;


    protected $fillable = [
        'service_id',
        'subject',
        'full_name',
        'email',
        'phone',
        'company',
        'message',
        'attachment',
        'status',
        'language'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


   /**
     * Show the increase in request form count from the last request form creation date
     * @return int
     */

    public static function countIncreasInRequest() : int
    {
        $lastRequest = RequestForm::latest()->first();
        if (!$lastRequest) {
            return 0;
        }
        $lastRequestDate = $lastRequest->created_at->startOfDay();
        $endOfDay = $lastRequest->created_at->endOfDay();

        // Count Requests registered on the same day as the last Request, excluding the last Request
        $requestCount = RequestForm::where('created_at', '>=', $lastRequestDate)
            ->where('created_at', '<=', $endOfDay)
            ->where('id', '!=', $lastRequest->id)
            ->count();

        return $requestCount;
    }

    public function getAttachmentAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }


}
