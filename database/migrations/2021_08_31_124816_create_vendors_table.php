<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contact_person');
            $table->string('contact_mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('address');
            $table->bigInteger('state');
            $table->string('pan',12);
            $table->longText('description');
            $table->string('tin_number');
            $table->string('gstin_number');
            $table->string('servicetax_number');
            $table->string('gst_category');
            $table->string('account_number');
            $table->string('ifsc_code');
            $table->string('bank_address');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
