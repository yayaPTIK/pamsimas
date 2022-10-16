<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Layanan;
use App\Models\Tagihan;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function scopeSearch($query)
    {
        return $query->where('name','like','%'.request('search').'%')->Orwhere('alamat','like','%'.request('search').'%');
    }
    public function scopeSearch2($query)
    {
        return $query->where('name','like','%'.request('search2').'%');
    }

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
    public function bulans()
    {
        return $this->hasMany(Tagihan::class);
    }
    public function tagihanss()
    {
        return $this->hasMany(Tagihan::class);
    }
    public function tagihs()
    {
        return $this->hasMany(Tagihan::class)->first('m_lalu');
    }

    public function tagihs2()
    {
        return $this->hasMany(Tagihan::class)->where('status',false)->sum('total');
    }
}
