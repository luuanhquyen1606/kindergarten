<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $groupId = DB::table('permission_groups')->where('name', 'Điểm danh')->value('id');
        if (!$groupId) {
            $groupId = DB::table('permission_groups')->insertGetId([
                'name' => 'Điểm danh',
                'description' => 'Quản lý điểm danh học sinh',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (!DB::table('permissions')->where('resource', 'attendances')->exists()) {
            DB::table('permissions')->insert([
                'name' => 'Điểm danh',
                'resource' => 'attendances',
                'permission_group_id' => $groupId,
                'show' => 1,
                'enable_by_default' => 1,
                'description' => 'Cho phép giáo viên điểm danh học sinh trong lớp mình phụ trách',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $permissionId = DB::table('permissions')->where('resource', 'attendances')->value('id');
        if ($permissionId) {
            DB::table('users_permissions')->where('permission_id', $permissionId)->delete();
            DB::table('permissions')->where('id', $permissionId)->delete();
        }

        $groupId = DB::table('permission_groups')->where('name', 'Điểm danh')->value('id');
        if ($groupId && !DB::table('permissions')->where('permission_group_id', $groupId)->exists()) {
            DB::table('permission_groups')->where('id', $groupId)->delete();
        }
    }
};
