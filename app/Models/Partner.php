<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['id','image', 'name', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
