<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountent_user_id')->default(0);
            $table->string('comp_name');
            $table->string('tax_number')->nullable();
            $table->string('tax_dept')->nullable();
            $table->string('indus_num')->nullable();
            $table->string('comer_no')->nullable();
            $table->string('comp_code')->nullable();
            $table->string('mar_email')->nullable();
            $table->string('mar_password')->nullable();
            $table->string('comp_fax')->nullable();
            $table->string('comp_created_at')->nullable();
            $table->unsignedBigInteger('comp_capital')->nullable();
            $table->bigInteger('ex_debt')->default(0);
            $table->string('elect_portal')->nullable();
            $table->string('elect_portal_password')->nullable();
            $table->boolean('state')->default(1);
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
        Schema::dropIfExists('public_companies');
    }
}
