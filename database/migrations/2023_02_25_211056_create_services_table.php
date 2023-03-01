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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('title', 100);
            $table->text('description');
            $table->string('file', 100);
            $table->float('price', 8, 2);
            $table->foreignId('initial_language_id')
                ->constrained('languages');
            $table->foreignId('final_language_id')
                ->constrained('languages');
            $table->foreignId('translator_id')
                ->nullable()
                ->constrained('users')
                ->default(null);
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
