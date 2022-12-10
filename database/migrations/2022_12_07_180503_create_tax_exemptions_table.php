<?php

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
        Schema::create('tax_exemptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('real_estate_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('assigned')->index();
            $table->string('beneficiary')->index();
            $table->string('real_estate_owner')->index();
            $table->string('relationship')->index();
            $table->text('national_id')->index();
            $table->unsignedSmallInteger('exclusion_value');
            $table->text('notes')->nullable();
            $table->boolean('assigned_same_beneficiary')->default(false);
            $table->timestamps();
            // كود الملك - المكلف - المستفيد - علاقتهم ببعض - المكلف هو هو المستفيد ولا لا

            /*
             * 
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_exemptions');
    }
};
