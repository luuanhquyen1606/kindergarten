<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Record every migration file already present on disk as run, so a
     * database that already has the schema (e.g. restored from a dump)
     * won't have Laravel try to re-run them.
     */
    public function up(): void
    {
        $table = config('database.migrations.table', 'migrations') ?: 'migrations';
        $thisMigration = pathinfo(__FILE__, PATHINFO_FILENAME);

        $alreadyRecorded = DB::table($table)->pluck('migration')->all();

        $batch = (int) DB::table($table)->max('batch') + 1;

        $files = collect(File::files(__DIR__))
            ->map(fn ($file) => $file->getFilenameWithoutExtension())
            ->filter(fn ($name) => $name !== $thisMigration && ! in_array($name, $alreadyRecorded, true))
            ->sort()
            ->values();

        if ($files->isEmpty()) {
            return;
        }

        $rows = $files->map(fn ($migration) => [
            'migration' => $migration,
            'batch' => $batch,
        ])->all();

        DB::table($table)->insert($rows);
    }

    public function down(): void
    {
        // Intentionally left blank: this migration only backfills tracking
        // rows for pre-existing schema and has nothing to reverse.
    }
};
