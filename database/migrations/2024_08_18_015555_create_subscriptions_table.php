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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Ongoing','Canceled'])->default('Ongoing');
            $table->integer('length');
            $table->string('cancel_reason')->nullable();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('offer_id')->nullable()->constrained('offers');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
