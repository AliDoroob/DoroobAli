<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['image','description', 'name', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
