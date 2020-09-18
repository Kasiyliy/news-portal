<?php


namespace App\Models\Entities\Content\Business;


use Illuminate\Database\Eloquent\Model;

class BusinessContent extends Model
{
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/business/contents';
    protected $fillable = [
        'title','description','image_path','category_id'
    ];

    public function category() {
        return $this->belongsTo(BusinessCategory::class, 'category_id', 'id');
    }
}
