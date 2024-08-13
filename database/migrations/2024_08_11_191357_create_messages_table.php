<?php

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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('senderId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('receiverId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('childId')->constrained('childrens')->nullable()->cascadeOnDelete();
            $table->string('content')->nullable(false);
            $table->boolean('readStatus')->default(false);
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
        Schema::dropIfExists('messages');
    }
};
