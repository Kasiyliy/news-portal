<?php

namespace App\Models\Entities\Content\Forum;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;

class ForumMessage extends Model
{
    protected $fillable = [
        'text','forum_topic_id','user_id'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function likes() {
        return $this->hasMany(MessageLike::class, 'forum_message_id', 'id')->where('liked',true);
    }
    public function dislikes() {
        return $this->hasMany(MessageLike::class, 'forum_message_id', 'id')->where('liked',false);
    }
}
