<?php

use App\Models\Corporation;
use App\Models\Document;
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
        Schema::create('corporate_document', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Corporation::class);
            $table->foreignIdFor(Document::class);
            $table->string('file_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporate_document');
    }
};
