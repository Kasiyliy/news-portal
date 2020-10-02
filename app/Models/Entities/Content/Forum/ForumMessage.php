<?php

namespace App\Models\Entities\Content\Forum;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function liked($id){
        $liked = false;
        $likedMessage = MessageLike::where('user_id',$id)->first();
        if($likedMessage){
            $liked =true;
        }
        return $liked;
    }

    public function messageLike($id) {
        return $this->hasOne(MessageLike::class, 'forum_message_id', 'id')
            ->where('user_id', $id)->first();
    }
}
