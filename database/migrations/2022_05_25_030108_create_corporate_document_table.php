<?php

use App\Models\Corporate;
use App\Models\Document;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateDocumentTable extends Migration
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
            $table->foreignIdFor(Corporate::class);
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
}
