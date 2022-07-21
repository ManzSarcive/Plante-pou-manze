<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'tel_number',
        'email',
        'panier_id',
        'res_date'
    ];

    protected $dates = [
        'res_date'
        

    ];

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

}
