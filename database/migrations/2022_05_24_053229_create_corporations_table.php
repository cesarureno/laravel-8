<?php

use App\Models\User;
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
        Schema::create('corporations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('business_name', 75);
            $table->string('logo', 255)->nullable();
            $table->string('db_name', 45)->nullable();
            $table->string('db_user', 45)->nullable();
            $table->string('db_password', 150)->nullable();
            $table->string('system_url', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->dateTime('registered_at');

            $table->foreignIdFor(User::class);

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
        Schema::dropIfExists('corporations');
    }
};
