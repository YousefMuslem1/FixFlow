<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountent_user_id');
            $table->unsignedBigInteger('user_id');
            $table->string('comp_name');
            $table->string('comp_man_name')->nullable();
            $table->string('id_num')->nullable();
            $table->string('email')->nullable();
            $table->string('man_phone')->nullable();
            $table->string('comp_fax')->nullable();
            $table->string('comp_address')->nullable();
            $table->string('tax_number')->nullable();
            $table->bigInteger('ex_dept')->nullable();
            $table->string('tax_dept')->nullable();
            $table->string('elect_portal')->nullable();
            $table->string('elect_portal_password')->nullable();
            $table->string('comp_code')->nullable();
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
        Schema::dropIfExists('special_companies');
    }
}
