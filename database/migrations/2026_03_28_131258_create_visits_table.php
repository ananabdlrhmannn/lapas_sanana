<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('nik', 30);
            $table->string('phone', 30);
            $table->string('email')->nullable();
            $table->string('prisoner_name');
            $table->string('relationship');
            $table->date('visit_date');
            $table->string('session')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};