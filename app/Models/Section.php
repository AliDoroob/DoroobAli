<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['id','name', 'description', 'gif',"tiny_description"];

    public function services()
    {
        return $this->hasMany(Service::class);
    }


    
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
    



    public function partners()
    {
        return $this->hasMany(Partner::class);
    }



    public function projects()
    {
        return $this->hasMany(Project::class);
    }



    public function news()
{
    return $this->hasMany(News::class);
}



public function statistics()
{
    return $this->hasMany(Statistic::class);
}
}
