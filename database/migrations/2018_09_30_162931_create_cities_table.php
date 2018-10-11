<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCitiesTable
 */
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('province_id');

            // Charter code status: A = Accepted, R = Rejected, P = 'Pending'
            $table->string('charter_code')->comment('The code for the charter status that the city has.')->default('P');

            $table->integer('postal');
            $table->string('name', 100); 
            $table->string('lat', 50); 
            $table->string('lng', 50);
            $table->timestamps();

            // Foreign keys
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}
