<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('percent');
            $table->integer('limit');
            $table->date('expire_time');
            $table->text('used_by_user')->nullable();
            $table->schemalessAttributes('extra_attributes');
            $table->unsignedBigInteger('discountable_id');
            $table->string('discountable_type');
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
        Schema::dropIfExists('discounts');
    }
};
