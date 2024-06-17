<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

final class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'immutable_datetime',
        ];
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $field ??= 'id';

        $key = 'post.'.$field.'.'.Str::slug($value);

        return Cache::tags(['posts'])->rememberForever($key, function () use ($field, $value) {
            return $this->query()
                ->whereNotNull('published_at')
                ->where($field, $value)
                ->firstOrFail();
        });
    }
}
