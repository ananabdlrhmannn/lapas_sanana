<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->json('permissions')->nullable()->after('role');
        });

        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $permissions = match ($user->role ?? 'registrasi') {
                'admin' => [
                    'manage_users',
                    'manage_news',
                    'manage_galleries',
                    'manage_visits',
                    'manage_complaints',
                ],
                'humas' => [
                    'manage_news',
                    'manage_galleries',
                    'manage_complaints',
                ],
                default => [
                    'manage_visits',
                    'manage_complaints',
                ],
            };

            DB::table('users')
                ->where('id', $user->id)
                ->update(['permissions' => json_encode($permissions)]);
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('permissions');
        });
    }
};
