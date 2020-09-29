<?php

namespace App\Models\Entities\Content\Forum;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $fillable = [
        'name','parent_category_id'
    ];

    public function childCategories(){
        return $this->hasMany(ForumCategory::class, 'parent_category_id', 'id');

    }
}
