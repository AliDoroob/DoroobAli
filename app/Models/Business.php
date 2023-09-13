<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'description', 'section_id','news_id','content','datetime','is_public', 'youtube_link'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    

  
public function setNewsIdAttribute($value)
{
    if (is_array($value)) {
        $this->attributes['news_id'] = implode(',', $value);
    } else {
        $this->attributes['news_id'] = $value;                    
    }
}

public function getNewsIdAttribute($value)
{
    return explode(',', $value);
}

}
