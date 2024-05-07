<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('club_follow', function (Blueprint $table) {

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('follower_id')->constrained('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('club_follow');
    }
};
