<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;





class News extends Model
{
    protected $fillable = ['name', 'image', 'section_id', 'description', 'news_id', 'datetime', 'content'];

    // Define an accessor to get an array of news_ids
    public function getNewsIdAttribute($value)
    {
        return explode(',', $value);
    }

    // Define a mutator to set news_ids as a comma-separated string
    public function setNewsIdAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['news_id'] = implode(',', $value);
        } else {
            $this->attributes['news_id'] = $value;                    
        }
    }
}
