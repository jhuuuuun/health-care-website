<?php

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
        Schema::create('doctors', function (Blueprint $table) {

            $table->id();

            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('fname');
            
            $table->string('mname')->nullable();
            
            $table->string('lname');

            $table->string('slug')->unique();

            $table->string('specialization');

            $table->text('credentials')->nullable();

            $table->longText('biography')->nullable();

            $table->string('photo')->nullable();

            $table->text('schedule')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
