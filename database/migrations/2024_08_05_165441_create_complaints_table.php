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
            $table->foreignId('user_id')->constrained('User')->restrictOnDelete();
            $table->enum('complain_type', ['type1', 'type2', 'type3']); 
            $table->foreignId('department_id')->constrained()->restrictOnDelete();
            $table->foreignId('subdepartment_id')->constrained()->restrictOnDelete();
            $table->string('complaint_short_description',255);
            $table->text('complaint_description');
            $table->boolean('status');
            $table->timestamps('complaint_reg_date');
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
