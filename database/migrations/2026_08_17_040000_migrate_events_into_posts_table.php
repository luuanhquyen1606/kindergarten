<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Event columns that don't map to a native posts column get
     * stored as key/value rows in post_meta instead.
     */
    private const META_KEYS = ['price', 'start_at', 'end_at', 'accept_donation', 'location'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $events = DB::table('events')->get();

        foreach ($events as $event) {
            $postId = DB::table('posts')->insertGetId([
                'school_id' => $event->school_id,
                'type' => 'event',
                'title' => $event->title,
                'summary' => $event->summary,
                'content' => $event->content,
                'photo_id' => $event->photo_id,
                'slug' => $event->slug,
                'is_published' => 1,
                'created_at' => $event->created_at,
                'updated_at' => $event->updated_at,
                'deleted_at' => $event->deleted_at,
            ]);

            foreach (self::META_KEYS as $key) {
                if (is_null($event->{$key})) {
                    continue;
                }

                DB::table('post_meta')->insert([
                    'post_id' => $postId,
                    'school_id' => $event->school_id,
                    'meta_key' => $key,
                    'meta_value' => $event->{$key},
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $eventFiles = DB::table('event_files')->where('event_id', $event->id)->get();

            foreach ($eventFiles as $eventFile) {
                DB::table('post_files')->insertOrIgnore([
                    'post_id' => $postId,
                    'file_id' => $eventFile->file_id,
                    'school_id' => $eventFile->school_id,
                    'created_at' => $eventFile->created_at,
                    'updated_at' => $eventFile->updated_at,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $postIds = DB::table('posts')->where('type', 'event')->pluck('id');

        DB::table('post_meta')->whereIn('post_id', $postIds)->delete();
        DB::table('post_files')->whereIn('post_id', $postIds)->delete();
        DB::table('posts')->whereIn('id', $postIds)->delete();
    }
};
