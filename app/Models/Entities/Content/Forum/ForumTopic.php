<?php

namespace App\Models\Entities\Content\Forum;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    protected $fillable = [
        'title','forum_category_id','user_id'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category() {
        return $this->belongsTo(ForumCategory::class, 'forum_category_id', 'id');
    }

    public function messages() {
        return $this->hasMany(ForumMessage::class, 'forum_topic_id', 'id');
    }
}
