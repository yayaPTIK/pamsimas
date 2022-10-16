<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Tagihan extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Tagihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query)
    {
        return $query->where('transaksiID','like','%'.request('search').'%')->Orwhere('bulan','like','%'.request('search').'%')->orWhere('name','like','%'.request('search').'%');
    }
    
    public function scopeReport($query)
    {
        // where date between
        if (request('start_date') && request('end_date')) {
            $start =  Carbon::parse(request()->start_date)->startOfDay()->toDateTimeString();
            $end = Carbon::parse(request()->end_date)->endOfDay()->toDateTimeString();
            $filleter = $query->whereBetween('updated_at',[$start, $end]);
            return $filleter;
        }else{
            return $query;
        }
    }
}