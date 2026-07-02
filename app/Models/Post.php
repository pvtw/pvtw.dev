<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonImmutable;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property CarbonImmutable|null $published_at
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 * @property CarbonImmutable|null $deleted_at
 */
final class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;
    use SoftDeletes;

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
            'id' => 'int',
            'title' => 'string',
            'slug' => 'string',
            'content' => 'string',
            'meta_title' => 'string',
            'meta_description' => 'string',
            'published_at' => 'immutable_datetime',
            'created_at' => 'immutable_datetime',
            'updated_at' => 'immutable_datetime',
            'deleted_at' => 'immutable_datetime',
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
