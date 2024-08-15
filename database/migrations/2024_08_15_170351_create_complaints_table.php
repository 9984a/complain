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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->enum('compalint_type', ['type1', 'type2', 'type3']);
            $table->foreignId('department_id')->constrained('departments')->restrictOnDelete();
            $table->foreignId('sub_department_id')->constrained('sub_departments')->restrictOnDelete();
            $table->string('short_description', 255);
            $table->longText('description');
            $table->boolean('status')->default(1);
            $table->timestamp('complain_reg_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
