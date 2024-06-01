<?php
namespace App\Modules\Content\Services\Crud;
use Illuminate\Support\Facades\DB;
use App\Modules\Content\Models\ContentRequest;

class ContentRequestService
{
    public function execute(array $data): ContentRequest
    {
        DB::beginTransaction();
        try {
            $contentRequest = ContentRequest::create([
                'language' => $data['language'],
                'word_count' => $data['word_count'],
                'topic' => $data['topic'],
                'delivery_date' => $data['delivery_date'],
                'project_id' => $data['project_id'],
                'user_id' => $data['user_id'],
            ]);

            DB::commit();
            return $contentRequest;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}