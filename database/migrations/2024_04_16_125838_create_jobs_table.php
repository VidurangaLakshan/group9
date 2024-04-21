<?php

use App\Models\User;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('name');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('company');
            $table->string('apply_link')->nullable();
            $table->text('qualifications');
            $table->string('faculty');
            $table->string('image')->nullable();
            $table->boolean('approved')->default(false);
            $table->string('reason_for_rejection');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
