<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('url');
            $table->integer('fetch_status');
            $table->string('fetch_name');
            $table->timestamps();
        });
          // Insert some production data
        DB::table('banks')->insert(array(
            array('bank_name'=>'CB','url'=>'https://www.cbbank.com.mm/en','fetch_status'=>'0','fetch_name'=>''),
            array('bank_name'=>'KBZ','url'=>'https://www.kbzbank.com/mm/','fetch_status'=>'0','fetch_name'=>''),
            array('bank_name'=>'MAB','url'=>'https://www.mabbank.com/','fetch_status'=>'0','fetch_name'=>'')
        ));
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
