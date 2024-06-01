<?php

namespace Database\Seeders;

use App\Models\RequestForm;
use App\Models\Service;
use App\Models\User;
use App\Models\Language;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Modules\Content\Models\ContentRequest;
use App\Modules\Project\Models\Project;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      /*  $userCount = (int) $this->command->ask('How many users would you like to create?', 10);

        for ($i = 0; $i < $userCount; $i++) {

            $user= User::factory()->create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('password'),
    
            ]);
    
            $project = Project::factory()->create([
                'name' => fake()->name(),
                'description' => 'Test Description',
                'user_id' => $user->id,
            ]);
    
            ContentRequest::factory()->create([
                'language' => fake()->name(),
                'word_count' => 1000,
                'topic' => 'Test Topic',
                'delivery_date' => now(),
                'project_id' => $project->id,
                'user_id' => $user->id,
            ]);
           
        }
        */

        $user= User::factory()->create([
            'name' => 'Jackson Weako',
            'email' => 'jackson@gmail.com',
            'password' => bcrypt('password'),

        ]);
        


        Service::create([
            'name' => 'Translation',
            'slug' => 'translation',
            'icon' => 'Test Icon',
            'image' => 'Test Image',
            'description' => 'Test Description',
            'content' => 'Test Content',
        ]);

        Service::create([
            'name' => 'Interpretation',
            'slug' => 'interpretation',
            'icon' => 'Test Icon',
            'image' => 'Test Image',
            'description' => 'Test Description',
            'content' => 'Test Content',
        ]);

        $service = Service::create([
            'name' => 'Language Learning',
            'slug' => 'language-learning',
            'icon' => 'Test Icon',
            'image' => 'Test Image',
            'description' => 'Test Description',
            'content' => 'Test Content',
        ]);

        Service::create([
            'name' => 'Proofreading',
            'slug' => 'proofreading',
            'icon' => 'Test Icon',
            'image' => 'Test Image',
            'description' => 'Test Description',
            'content' => 'Test Content',
        ]);

        Service::create([
            'name' => 'Transcription',
            'slug' => 'transcription',
            'icon' => 'Test Icon',
            'image' => 'Test Image',
            'description' => 'Test Description',
            'content' => 'Test Content',
        ]);

        $language = Language::create([
            'name' => 'English',
            'service_id' => $service->id,
             'code' => 'en',
             'locale' => 'en_US',
             'flag' => 'us',
        ]);

        Language::create([
            'name' => 'Spanish',
            'service_id' => $service->id,
             'code' => 'es',
             'locale' => 'es_ES',
             'flag' => 'es',
        ]);

        Language::create([
            'name' => 'French',
            'service_id' => $service->id,
             'code' => 'fr',
             'locale' => 'fr_FR',
             'flag' => 'fr',
        ]);

        Language::create([
            'name' => 'German',
            'service_id' => $service->id,
             'code' => 'de',
             'locale' => 'de_DE',
             'flag' => 'de',
        ]);
        



        

       /* RequestForm::create([
            'service_id' => 1,
            'subject' => 'Test 2 Subject',
            'full_name' => 'Test 2 Name',
            'email' => 'test@gmail.com',
            'phone' => '1234567890',
            'company' => 'Test Company',
            'message' => 'Test Message',
            'attachment' => 'Test Attachment',
            'status' => 'new',
        ]);
        */


        $this->command->info('Database seeded!');

        
    }
}
