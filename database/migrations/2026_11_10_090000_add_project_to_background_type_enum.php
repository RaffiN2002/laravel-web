<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Alter the enum to add 'project' as a valid type
        DB::statement("ALTER TABLE `background` MODIFY `type` ENUM('experience', 'education', 'project') NOT NULL");
    }

    public function down()
    {
        DB::statement("ALTER TABLE `background` MODIFY `type` ENUM('experience', 'education') NOT NULL");
    }
};

