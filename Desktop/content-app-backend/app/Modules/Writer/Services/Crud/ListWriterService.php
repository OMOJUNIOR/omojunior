<?php
namespace App\Modules\Writer\Services\Crud;
use App\Modules\Writer\Models\Writer;


class ListWriterService
{
    /**
     * List all writers
     *
     * Illuminate\Database\Eloquent\Collection
     */
    public static function listWriters(): \Illuminate\Database\Eloquent\Collection
    {
        return Writer::ListWriters();
    }
}