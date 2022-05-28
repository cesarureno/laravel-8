<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Corporation;
use App\Models\Document;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation_document', function (Blueprint $table) {
            $table->id();
            $table->string('file_url');

            $table->foreignIdFor(Corporation::class);
            $table->foreignIdFor(Document::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporation_document');
    }
};
