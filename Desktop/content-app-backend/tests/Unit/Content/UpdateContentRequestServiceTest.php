<?php

namespace Tests\Unit\Content;

use App\Modules\Content\Services\Crud\updateContentRequestService;
use Tests\TestCase;
use App\Models\User;
use App\Modules\Project\Models\Project;
use App\Modules\Content\Models\ContentRequest;
use App\Modules\Writer\Models\Writer;
use App\Modules\Writer\Services\Crud\WriterService;
use App\Modules\Writer\Services\Crud\ListWriterService;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UpdateContentRequestServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $updateContentRequestService;

    protected $writerService;

    protected $listWriterService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->updateContentRequestService = new updateContentRequestService();
        $this->writerService = new WriterService();
        $this->listWriterService = new ListWriterService();
    }

    /**
     * update a content request
     */
    public function test_update_content_request()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $user = User::create($userData);

        $projectData = [
            'name' => 'Test Project',
            'description' => 'Test Description',
            'user_id' => $user->id
        ];

        $project = Project::create($projectData);

        $this->writerService->updateUserAsWriter($user->id);

        $writers = $this->listWriterService->listWriters();

        $this->assertEquals($writers->count(), 1);

        $writer = $writers->first();

        $contentRequestData = [
            'language' => 'Chinese',
            'word_count' => 1000,
            'topic' => 'Test Topic',
            'delivery_date' => now(),
            'project_id' => $project->id,
            'user_id' => $user->id,
        ];

        $contentRequest = ContentRequest::create($contentRequestData);

        $data['writer_id'] = $writer->id;
        $data['status'] = 'assigned';

        $this->updateContentRequestService->updateContentRequest($contentRequest->id, $data);

        $contentRequest = ContentRequest::find($contentRequest->id);

        $this->assertEquals($contentRequest->status, 'assigned');

        $this->assertEquals($contentRequest->writer_id, $writer->id);

        $this->assertDatabaseHas('content_requests', [
            'id' => $contentRequest->id,
            'status' => 'assigned',
            'writer_id' => $writer->id
        ]);
        
    }
}
