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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->string('file');
            $table->foreignId('approval_by')->nullable()->references('id')->on('users');
            $table->integer('status')->default(1)->comment('0:ditolak 1:pending 2:disetujui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
