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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->enum('complain_type', ['type1', 'type2', 'type3']);
            $table->foreignId('department_id')->constrained('departments')->restrictOnDelete();
            $table->foreignId('subdepartment_id')->constrained('sub_departments')->restrictOnDelete();
            $table->string('complaint_short_description', 255);
            $table->text('complaint_description');
            $table->boolean('status')->default(false);
            $table->timestamp('complaint_reg_date')->nullable(); // Use this if the date can be null
            $table->timestamps(); // This will add created_at and updated_at columns
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
