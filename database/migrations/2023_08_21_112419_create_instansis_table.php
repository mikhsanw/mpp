<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInstansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instansis', function (Blueprint $table) {
            $table->uuid('id')->primary();
			$table->string('nama')->nullable();
			$table->text('alamat')->nullable();
			$table->string('telepon',15)->nullable();
			$table->string('tracking')->nullable();
			$table->string('email',30)->nullable();
			$table->text('website')->nullable();
			$table->text('layanan')->nullable();
			$table->text('dasarhukum')->nullable();
			$table->text('persyaratan')->nullable();
			$table->text('waktudanbiaya')->nullable();
			$table->text('alur')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instansis');
    }
}
