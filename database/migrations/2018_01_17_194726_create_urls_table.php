<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('urls', function (Blueprint $table) {
            $table->string('hash')->unique();
            $table->string('domain');
            $table->string('url', 2000);
            $table->string('access_count')->default(0);
            $table->timestamps();

            $table->primary('hash');
            $table->index(['domain']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('urls');
    }
}
