<?php

namespace App\Models\Entities\Content\Forum;

use App\Models\Entities\Core\User;
use Illuminate\Database\Eloquent\Model;

class MessageLike extends Model
{
    protected $fillable = [
        'forum_message_id','user_id','liked'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
