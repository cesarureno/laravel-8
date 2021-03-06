<?php

use App\Models\Corporation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('position', 45);
            $table->string('comments', 255);
            $table->string('phone_number', 12);
            $table->string('mobile_phone_number', 12);
            $table->string('email', 45);

            $table->foreignIdFor(Corporation::class);

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
        Schema::dropIfExists('contacts');
    }
};
