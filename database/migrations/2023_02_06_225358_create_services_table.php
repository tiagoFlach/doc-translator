<?php

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(User::class)->constrained();
			$table->string('name', 100);
			$table->string('file', 100);
			$table->integer('price');
			$table->foreignId('initial_language_id')
				->constrained('languages');
			$table->foreignId('final_language_id')
				->constrained('languages');
			$table->foreignId('tradutor_id')
				->constrained('users')
				->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
