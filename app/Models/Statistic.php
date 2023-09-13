<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = ['id','image', 'name','number', 'section_id'];




    

    public function section()
    {
        return $this->belongsTo(Section::class);
    }




}
