<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';
    protected $fillable = ['title','content', 'user_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
}
