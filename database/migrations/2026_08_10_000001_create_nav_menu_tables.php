<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nav_groups', function (Blueprint $table) {
            $table->id();
            $table->string('key', 64)->unique();
            $table->string('label');
            $table->string('tipo', 32)->default('section');
            $table->string('academic_nivel', 64)->nullable();
            $table->string('informes_key', 64)->nullable();
            $table->string('css_class', 64)->nullable();
            $table->boolean('show_in_main_nav')->default(true);
            $table->boolean('show_in_topbar')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('visible_desktop')->default(true);
            $table->boolean('visible_mobile')->default(true);
            $table->unsignedInteger('orden')->default(0);
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('nav_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('nav_groups')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('nav_links')->nullOnDelete();
            $table->string('label');
            $table->string('route_name', 128)->nullable();
            $table->string('url')->nullable();
            $table->boolean('external')->default(false);
            $table->boolean('visible')->default(true);
            $table->boolean('visible_desktop')->default(true);
            $table->boolean('visible_mobile')->default(true);
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nav_links');
        Schema::dropIfExists('nav_groups');
    }
};
