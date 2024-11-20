<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_lang_id')->constrained()->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->string('title');
            $table->text('description');
            $table->string('cover')->nullable();
            $table->string('github')->nullable();
            $table->string('external')->nullable();
            $table->json('tech');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_sections');
    }
};