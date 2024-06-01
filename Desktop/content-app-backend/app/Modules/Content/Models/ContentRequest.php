<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ContentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'word_count',
        'topic',
        'delivery_date',
        'project_id',
        'user_id',
        'writer_id',
        'status'
    ];

    protected $casts = [
        'delivery_date' => 'datetime',
    ];
   
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function writer()
    {
        return $this->belongsTo(\App\Modules\Writer\Models\Writer::class);
    }

    /**
     * Assign content to a writer 
     * 
     */

    public function assignToWriter($writerId){
        try{
            $data = $this->update([
                'writer_id' => $writerId,
                'status' => 'assigned'
            ]);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
     
        Log::info('Content assigned to writer',[
            'content_id' => $this->id,
            'writer_id' => $writerId,
            'data' => $data
        ]);

        return $data;
    }
}
