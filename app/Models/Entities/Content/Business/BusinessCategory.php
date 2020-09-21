<?php


namespace App\Models\Entities\Content\Business;


use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/business/categories';
    protected $fillable = [
        'name','image_path','parent_category_id'
    ];

    public function contents() {
        return $this->hasMany(BusinessContent::class, 'category_id', 'id');
    }

    public function childCategories(){
        return $this->hasMany(BusinessCategory::class, 'parent_category_id', 'id');

    }
}
