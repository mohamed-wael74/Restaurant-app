<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['name','description','price','image','menu_id'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
