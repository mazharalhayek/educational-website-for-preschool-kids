<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tutor_id")->constrained('tutors')->cascadeOnDelete();
            $table->foreignId("child_id")->constrained('childrens')->cascadeOnDelete();
            $table->integer('review')->nullable(true)->default(null);
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
        Schema::dropIfExists('tutor_children');
    }
};
