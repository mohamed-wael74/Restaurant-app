<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";
    protected $fillable = ['first_name','last_name','email','mob_number','res_date','table_id','guest_number'];

    protected $dates =[
        'res_date'
    ];

    function table(){
        return $this->belongsTo(Table::class);
    }
}
