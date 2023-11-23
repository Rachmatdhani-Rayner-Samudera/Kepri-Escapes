<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory,Sluggable;
    protected $table = 'tb_category';
    protected $fillable = ['category_name', 'slug'];

   public function Post()
   {
    return $this->hasMany(Post::class);
   }

   public function Sluggable(): array
   {
           return [
               'slug' => [
                   'source' => 'category_name'
               ]
           ];
   }
}
