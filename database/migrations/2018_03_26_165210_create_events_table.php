<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
			$table->enum('category', ['SPORT', 'CULTURE', 'OTHER']);
			$table->string('name')->unique();
			$table->text('description');
			$table->date('date');
			$table->time('time');
			$table->string('address');
			$table->string('postcode');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('likes')->default(0);
            $table->timestamps();
			$table->foreign('user_id')
					->references('id')
					->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
