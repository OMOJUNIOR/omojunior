<?php

namespace Tests\Unit\Content;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Content\Services\Crud\ContentRequestService;
use Tests\TestCase; 
use App\Modules\Project\Models\Project;
use App\Models\User;

class ContentRequestServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $contentRequestService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->contentRequestService = new ContentRequestService();
    }

    /**
     * Test createContentRequest method.
     */
    public function test_content_request_creation()
    {

        // Create a user

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $user = User::create($userData);


        // Create a project
        $projectData = [
            'name' => 'Test Project',
            'description' => 'Test Description',
            'user_id' => $user->id,
        ];

        $project = Project::create($projectData);

        


        $factoryData = [
            'language' => 'English',
            'word_count' => 500,
            'topic' => 'Test Topic',
            'delivery_date' => date('Y-m-d H:i:s'),
            'project_id' => $project->id,
            'user_id' => $user->id,
        ];
        
        $contentRequest = $this->contentRequestService->execute($factoryData);

        // Check if the content request is saved in the database

        $this->assertDatabaseHas('content_requests', [
            'language' => $contentRequest->language,
            'word_count' => $contentRequest->word_count,
            'topic' => $contentRequest->topic,
            'delivery_date' => $contentRequest->delivery_date->format('Y-m-d'),
            'project_id' => $contentRequest->project_id,
            'user_id' => $contentRequest->user_id,
        ]);


    }
}
