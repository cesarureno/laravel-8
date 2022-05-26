<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Corporate;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('business_name', 150);
            $table->string('rfc', 13);
            $table->string('country', 75);
            $table->string('state', 75);
            $table->string('city', 75);
            $table->string('neighborhood', 75);
            $table->string('address', 100);
            $table->string('postal_code', 5);
            $table->string('cfdi', 45);
            $table->string('rfc_url', 255);
            $table->string('acta_url', 255);
            $table->boolean('status', 255)->default(true);
            $table->string('comments', 255);

            $table->foreignIdFor(Corporate::class);

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
        Schema::dropIfExists('companies');
    }
};
