<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryD extends Model
{
    use HasFactory,Sluggable;
    protected $table = 'tb_categoryd';
    protected $fillable = ['category_name', 'slug'];

   public function Destination(){
    return $this->hasMany(Destination::class);
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
