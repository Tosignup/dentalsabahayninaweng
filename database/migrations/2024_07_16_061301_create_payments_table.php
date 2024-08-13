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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('tooth_number');
            $table->string('dentist');
            $table->string('procedure');
            $table->decimal('charge', 8, 2);
            $table->decimal('balance_remaining', 8, 2);
            $table->decimal('paid', 8, 2);
            $table->text('remarks')->nullable();
            $table->boolean('signature')->default(false);
            $table->date('payment_date');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
