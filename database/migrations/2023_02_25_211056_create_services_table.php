<?php

use App\Models\Category;
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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained();
            $table->string('title', 100);
            $table->text('description');
            $table->float('price', 8, 2);
            $table->string('source_file')
                ->nullable()
                ->default(null);
            $table->string('target_file')
                ->nullable()
                ->default(null);
            $table->foreignIdFor(Category::class)
                ->constrained();
            $table->foreignId('source_language_id')
                ->constrained('languages');
            $table->foreignId('target_language_id')
                ->constrained('languages');
            $table->foreignId('translator_id')
                ->nullable()
                ->constrained('users')
                ->default(null);
            $table->boolean('is_completed')
                ->default(false);
            $table->boolean('is_paid')
                ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
