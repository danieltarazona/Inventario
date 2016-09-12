<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
  public function comment()
  {
    return $this->hasMany(Comment::class);
  }

  public function comment_id()
  {
    return $this->comment->list('id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }
}
