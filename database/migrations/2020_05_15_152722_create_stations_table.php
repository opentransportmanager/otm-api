<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        /*Fix for inconsistent schema blueprint for $table->point() using PostGIS geography(point,) type instead
         Detailed explanation: https://github.com/laravel/framework/issues/32183 */
        DB::statement('ALTER TABLE stations ADD COLUMN position POINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
