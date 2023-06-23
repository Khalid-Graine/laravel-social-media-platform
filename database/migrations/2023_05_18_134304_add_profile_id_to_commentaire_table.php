<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    // Schema::table('posts', function (Blueprint $table) {
    //     if (!Schema::hasColumn('posts', 'profile_id')) {
    //         $table->unsignedBigInteger('profile_id');
    //         $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnDelete();
    //     }
    // });

    public function up(): void
    {
        Schema::table('commentaire', function (Blueprint $table) {
            if (!(Schema::hasColumn('commentaire', 'profile_id'))) {
                $table->unsignedBigInteger('profile_id');
                
                $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('commentaire', function (Blueprint $table) {
            //
        });
    }
};
