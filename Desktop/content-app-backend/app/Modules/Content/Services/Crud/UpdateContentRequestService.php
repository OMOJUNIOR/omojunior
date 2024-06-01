<?php
namespace App\Modules\Content\Services\Crud;

use App\Modules\Content\Models\ContentRequest;
use Illuminate\Support\Facades\Log;
class UpdateContentRequestService
{
    /**
     * Update a content request
     *
     * @param int $contentRequestId
     * @param array $data
     * @return ContentRequest
     */
    public function updateContentRequest(int $contentRequestId, array $data): ContentRequest
    {
        $contentRequest = ContentRequest::find($contentRequestId);

        if(!$contentRequest) {
            throw new \Exception('Content request not found');
            Log::error('Content request not found', [
                'content_request_id' => $contentRequestId
            ]);
        }

        $contentRequest->update($data);

        Log::info('Content request updated', [
            'content_request_id' => $contentRequestId,
            'data' => $contentRequest
        ]);

        return $contentRequest;
    }
}