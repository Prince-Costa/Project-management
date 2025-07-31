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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status');
            $table->string('total_charge')->nullable();
            $table->string('advance')->nullable();
            $table->dateTime('date_line')->nullable();
            $table->string('domain')->nullable();
            $table->string('cpanel_url')->nullable();
            $table->string('cpanel_user')->nullable();
            $table->string('cpanel_password')->nullable();
            $table->string('admin_panel_user')->nullable();
            $table->string('admin_panel_password')->nullable();
            $table->longtext('details')->nullable();
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
