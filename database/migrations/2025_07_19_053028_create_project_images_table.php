<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(1);
            $table->timestamps();
            
            $table->index(['project_id', 'sort_order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_images');
    }
};
