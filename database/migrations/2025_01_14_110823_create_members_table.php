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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

    $table->string('first_name');
    $table->string('middle_initial')->nullable();
    $table->string('last_name');
    $table->string('address');
    $table->date('birthdate');
    $table->string('religion');
    $table->date('join_date');
    $table->string('parent_leader');
    $table->string('membership_fee')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
