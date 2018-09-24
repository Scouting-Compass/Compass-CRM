<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTenantsTable 
 */
class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->nullable();
            $table->string('firstname'); 
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->timestamps();

            // Foreign keys 
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
