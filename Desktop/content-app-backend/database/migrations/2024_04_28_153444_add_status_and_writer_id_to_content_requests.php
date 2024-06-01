<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('content_requests', function (Blueprint $table) {
            $table->foreignId('writer_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'assigned','in_progress','reviewing','completed'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('content_requests', function (Blueprint $table) {
            $table->dropForeign(['writer_id']);
            $table->dropColumn('writer_id');
            $table->dropColumn('status');
        });
    }
};
