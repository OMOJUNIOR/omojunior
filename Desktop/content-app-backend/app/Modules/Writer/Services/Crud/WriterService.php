<?php
namespace App\Modules\Writer\Services\Crud;

use App\Models\User;
use App\Modules\Writer\Models\Writer;
class WriterService
{
    /**
     * Update a user as writer
     *
     * @param int $userId
     * @return Writer
     */
    public function updateUserAsWriter(int $userId): Writer
    {
        $user = User::find($userId);
        
        if(!$user) {
            throw new \Exception('User not found');
        }

        $assignUserAsWriter = Writer::create([
            'user_id' => $userId
        ]);

        if(! $assignUserAsWriter) {
            throw new \Exception('User not assigned as writer');
        }

        return $assignUserAsWriter;

    }
}