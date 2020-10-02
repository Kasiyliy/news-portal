<?php

namespace App\Models\Entities\Content\Forum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ForumCategory extends Model
{
    protected $fillable = [
        'name','parent_category_id'
    ];

    public function childCategories(){
        return $this->hasMany(ForumCategory::class, 'parent_category_id', 'id');

    }

    public function childCategoryMessages($id){
        $messageQuery = DB::table('forum_categories as fc')
            ->join('forum_topics as ft', 'ft.forum_category_id', '=', 'fc.id')
            ->join('forum_messages as fm', 'fm.forum_topic_id', '=', 'ft.id')
            ->where('fc.id', '=', $id)
            ->select('fm*')
        ->count();
        return $messageQuery;
    }

    public function categoryMessages($id){
        $messageQuery = DB::table('forum_categories as fc')
            ->join('forum_topics as ft', 'ft.forum_category_id', '=', 'fc.id')
            ->join('forum_messages as fm', 'fm.forum_topic_id', '=', 'ft.id')
            ->where('fc.parent_category_id', '=', $id)
            ->select('fm*')
            ->count();
        return $messageQuery;
    }


    public function childCategoryLastMessage($id){
        $messageQuery = DB::table('forum_categories as fc')
            ->join('forum_topics as ft', 'ft.forum_category_id', '=', 'fc.id')
            ->join('forum_messages as fm', 'fm.forum_topic_id', '=', 'ft.id')
            ->join('users as u', 'fm.user_id', '=', 'u.id')
            ->where('fc.id', '=', $id)
            ->select(['u.name as username',
                'u.email',
                'u.avatar_path',
                'fm.*'])
            ->latest()->first();

        return $messageQuery;
    }


    public function categoryLastMessage($id){
        $messageQuery = DB::table('forum_categories as fc')
            ->join('forum_topics as ft', 'ft.forum_category_id', '=', 'fc.id')
            ->join('forum_messages as fm', 'fm.forum_topic_id', '=', 'ft.id')
            ->join('users as u', 'fm.user_id', '=', 'u.id')
            ->where('fc.parent_category_id', '=', $id)
            ->select(['u.name as username',
                'u.email',
                'u.avatar_path',
                'fm.*'])
            ->latest()->first();

        return $messageQuery;
    }




}
