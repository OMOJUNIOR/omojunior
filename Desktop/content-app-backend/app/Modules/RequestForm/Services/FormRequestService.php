<?php
namespace App\Modules\RequestForm\Services;

use App\Models\RequestForm;
use Exception;

class FormRequestService
{
    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function create(array $data)
    {
       

        try {
            $requestForm = RequestForm::create([
                'service_id' => $data['service_id'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'message' => $data['message'],
                'language' => $data['language'] ?? null
            ]);

            return $requestForm;
        } catch (Exception $e) {
            throw new Exception('Failed to create request form: ' . $e->getMessage());
        }
    }
}
