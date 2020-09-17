<?php


namespace App\Models\Entities\Content\Business;


use App\Models\Entities\Content\GuideContent;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/business/categories';
    protected $fillable = [
        'name','image_path'
    ];

    public function contents() {
        return $this->hasMany(BusinessContent::class, 'category_id', 'id');
    }
}
