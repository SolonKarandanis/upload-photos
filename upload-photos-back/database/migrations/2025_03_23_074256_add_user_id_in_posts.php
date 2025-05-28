<?php

use App\Traits\WithDatabaseDriver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use WithDatabaseDriver;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $column = $table->foreignId('created_by')
                ->index();
            // This is where we apply the "fix" if
            // the driver is SQLite
            if ($this->databaseDriverIs("sqlite")) {
                $column->nullable()->constrained('users');
            }
            else{
                $column->constrained('users');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};
