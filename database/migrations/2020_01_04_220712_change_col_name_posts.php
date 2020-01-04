<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColNamePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::rename('posts', 'latest_posts');
    }   



    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {   
        Schema::rename('latest_posts', 'posts');
    }   
}
