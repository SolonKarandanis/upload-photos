<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function latestPost():HasOne
    {
        return $this->hasOne(Posts::class)->latestOfMany();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfers(): HasMany
    {
        return $this->hasMany(Transaction::class, 'sender');
    }

    public function account(): HasOne
    {
        return $this->hasOne(Account::class, 'user_id');
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function favouriteCars():BelongsToMany
    {
        return $this->belongsToMany(Car::class,'favourite_cars','user_id','car_id');
    }

    //User::withLastTransaction()
    public function scopeWithLastTransaction($query){
        $query->addSubSelect('latest_transaction', function($query){
            $query->select('created_at')
            ->from('transactions')
            ->whereColumn('user_id', 'users.id')
            ->lateset('created_at')
            ->limit(1);
        });
    }
}
