<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId('parent_id')->constrained('parents')->cascadeOnDelete()->cascadeOnUpdate();  
            $table->Integer("age");
            $table->string("password");
            $table->binary('image')->nullable(true)->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('childrens');
    }
};
