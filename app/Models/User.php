<?php

declare(strict_types=1);

namespace App\Models;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Carbon\CarbonInterface;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Override;

/**
 * @property int $id
 * @property string $name
 * @property string|null $username
 * @property string $email
 * @property CarbonInterface|null $email_verified_at
 * @property string|null $password
 * @property string|null $github_id
 * @property string|null $avatar_url
 * @property string|null $remember_token
 * @property CarbonInterface|null $created_at
 * @property CarbonInterface|null $updated_at
 * @property CarbonInterface|null $deleted_at
 *
 * @property-read bool $is_admin
 */
final class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'github_id',
        'avatar_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'password' => null,
    ];

    protected $appends = [
        'is_admin',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'name' => 'string',
            'username' => 'string',
            'email' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'github_id' => 'string',
            'avatar_url' => 'string',
            'remember_token' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * @return Attribute<bool, null>
     */
    protected function isAdmin(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): bool {
                return in_array($attributes[$this->getKeyName()], config()->array('admin.user_keys'));
            },
        );
    }

    #[Override]
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail());
    }

    #[Override]
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPassword($token));
    }
}
