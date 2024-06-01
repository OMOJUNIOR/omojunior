<?php

namespace Tests\Unit\Project;

use Tests\TestCase;
use App\Modules\Project\Services\Crud\CreateProjectService;
use App\Models\User;


class CreateProjectServiceTest extends TestCase
{
    protected $createProjectService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createProjectService = new CreateProjectService();
    }

    /**
     * Test createProject method.
     */
    public function test_project_creation()
    {

        //create User 

        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        $user = User::create($userData);
            


        $factoryData = [
            'name' => 'Test Project',
            'description' => 'Test Description',
            'user_id' => $user->id,
        ];

        $project = $this->createProjectService->execute($factoryData);

        $this->assertEquals($factoryData['name'], $project->name);
        $this->assertEquals($factoryData['description'], $project->description);
        $this->assertEquals($factoryData['user_id'], $project->user_id);
    }
}
