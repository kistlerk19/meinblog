<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table("users")
            ->insert([
                "email" => "iadmin19@gmail.com",
                "name" => "Kistler Gyamfi",
                "password" => bcrypt("password"),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table("users")->where("email", "=", "iadmin19@gmail.com");
    }
};
