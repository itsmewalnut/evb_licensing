<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'branch',
        'department',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials from their name.
     *
     * @return string|null
     */

    public function initials(): ?string
    {
        if (!$this->name) {
            return null;
        }

        return strtoupper(substr(trim($this->name), 0, 1)) ?: null;
    }

    // public function initials(): string
    // {
    //     return Str::of($this->name)
    //         ->explode(' ')
    //         ->map(fn (string $name) => Str::of($name)->substr(0, 1))
    //         ->implode('');
    // }
}
