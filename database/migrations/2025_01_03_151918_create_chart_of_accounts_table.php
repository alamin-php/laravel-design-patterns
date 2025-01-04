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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable(); // Optional for account numbering
            $table->unsignedBigInteger('parent_id')->nullable(); // Self-referencing parent
            $table->string('type')->nullable(); // Asset, Liability, Income, Expense, etc.
            $table->text('description')->nullable();
            $table->boolean('isDeletable')->default(true);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
