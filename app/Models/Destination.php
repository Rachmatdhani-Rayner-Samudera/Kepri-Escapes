<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Destination extends Model
{
    use HasFactory,Sluggable;
    protected $primaryKey = 'id';
    protected $table = 'tb_destination';
    protected $fillable = ['package_name', 'categoryd_id', 'package_price', 'package_content', 'slug', 'package_picture'];

    public function Categoryd(){
        return $this->belongsTo(CategoryD::class, 'categoryd_id');
        // return $this->belongsTo(Category::class, 'id_category');
    }

    public function Sluggable(): array
    {
            return [
                'slug' => [
                    'source' => 'package_name'
                ]
            ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function find($slug)
    {
        $packages = Destination::all();
        $package = [];
        foreach ($packages as $p) {
            if($p["slug"] === $slug){
                $package = $p;
            } 
    }
    
}
}
