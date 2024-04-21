<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullName')->nullable();
            $table->string('faculty')->nullable();
            $table->string('degree_level')->nullable();
            $table->string('graduation_year')->nullable();
            $table->boolean('display_comments')->nullable();
            $table->boolean('post_comments')->nullable();
            $table->boolean('interest_computing')->nullable();
            $table->boolean('interest_business')->nullable();
            $table->boolean('interest_law')->nullable();
            $table->boolean('newUserPersonalized')->default(0);
            $table->string('linkedin')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
