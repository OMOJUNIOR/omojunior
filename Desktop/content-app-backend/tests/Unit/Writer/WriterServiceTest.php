<?php

namespace Tests\Unit\Writer;

use Tests\TestCase;
use App\Modules\Writer\Services\Crud\WriterService;
use App\Modules\Writer\Services\Crud\ListWriterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class WriterServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $writerService;

    protected $listWriterService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->writerService = new WriterService();
        $this->listWriterService = new ListWriterService();
    }

    /**
     * update a user as writer 
     */

    public function test_update_user_as_writer_and_list_writer()
    {

        $userData = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password(),
        ];

        $user = User::create($userData);

        $this->writerService->updateUserAsWriter($user->id);

        $writers = $this->test_list_writers();

        $this->assertEquals($writers->count(), 1);
        $this->assertEquals($writers->first()->user->id, $user->id);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $writers);

       $this->assertDatabaseHas('writers', [
            'id' => $writers->first()->id,
            'user_id' => $user->id
        ]);
        
        
    }

    /**
     * List all writers
     */

    protected function test_list_writers()
    {
        $writers = $this->listWriterService->listWriters();
        return $writers;
    }
}
