<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AdminSetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add default values for projects delivered and client satisfaction
        AdminSetting::updateOrCreate(
            ['key' => 'projects_delivered'],
            ['value' => '10', 'description' => 'Number of projects delivered to clients']
        );
        
        AdminSetting::updateOrCreate(
            ['key' => 'client_satisfaction'],
            ['value' => '95', 'description' => 'Client satisfaction percentage']
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AdminSetting::where('key', 'projects_delivered')->delete();
        AdminSetting::where('key', 'client_satisfaction')->delete();
    }
};