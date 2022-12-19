<?php
namespace App\Traits;
use App\Models\Log;

trait LogTrait {
    protected static function booted()
    {
        static::created(function ($table) {
            $user_id  = auth()->id();
            $user_name  = auth()->user()->name;
            $tableId = $table->id;
            $tableName =$table->getTable();
            Log::create([
                'title' => "Admin $user_name created a new Raw: $tableId in $tableName Table",
                'user_id' => $user_id,
            ]);
        });
        static::updated(function ($table) {
            $user_id  = auth()->id();
            $user_name  = auth()->user()->name;
            $tableId = $table->id;
            $tableName =$table->getTable();
            Log::create([
                'title' => "Admin $user_name updated Raw: $tableId in $tableName Table",
                'user_id' => $user_id,
            ]);
        });
        static::deleted(function ($table) {
            $user_id  = auth()->id();
            $user_name  = auth()->user()->name;
            $tableId = $table->id;
            $tableName =$table->getTable();
            Log::create([
                'title' => "Admin $user_name deleted Row: $tableId in $tableName Table",
                'user_id' => $user_id,
            ]);
        });
    }
}
