<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('title');
            $table->string('department');
            $table->enum('status', ['active', 'inactive']);
            $table->enum('role', ['member', 'admin', 'owner']);
            $table->string('image')->default('https://i.pinimg.com/736x/b1/bd/bd/b1bdbdaea15e42631ca1b6491523a5ed.jpg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
