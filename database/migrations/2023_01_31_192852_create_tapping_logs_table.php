<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTappingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tapping_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->text('device')->nullable();
            $table->integer('count')->default(1);
            $table->foreignId('card_id')->nullable()->constrained('cards')->nullOnDelete();
            $table->foreignId('profile_id')->nullable()->constrained('profiles')->nullOnDelete();
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
        Schema::dropIfExists('tapping_logs');
    }
}
