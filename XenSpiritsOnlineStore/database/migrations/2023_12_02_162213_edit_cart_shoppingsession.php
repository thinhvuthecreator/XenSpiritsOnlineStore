<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("carts", function(Blueprint $table){
            $table->integer("shopping_session_id");       
        });
        Schema::table("shopping_session", function(Blueprint $table){
            $table->dropColumn("cart_id");       
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
