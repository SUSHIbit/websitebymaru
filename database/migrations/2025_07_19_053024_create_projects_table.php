<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('long_description');
            $table->decimal('price', 10, 2);
            $table->json('what_you_get')->nullable();
            $table->json('key_features')->nullable();
            $table->foreignId('project_type_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->string('telegram_username')->nullable();
            $table->timestamps();
            
            $table->index(['is_active', 'project_type_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
