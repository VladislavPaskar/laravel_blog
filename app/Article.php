<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    // article belongs to a user

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * @return mixed
     */
    public function getUserName(){
        $user = User::find($this->user_id);
        return $user->name;
    }
}
