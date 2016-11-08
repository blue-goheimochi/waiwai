<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Topic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body', 'status', 'link_id'];

    public function user()
    {
        return $this->belongsTo('\App\DataAccess\Eloquent\User');
    }

    public function comments()
    {
        return $this->hasMany('\App\DataAccess\Eloquent\Comment')->where('parent_comment_id', null);
    }

    public function link()
    {
        return $this->hasOne('\App\DataAccess\Eloquent\Link', 'link_id', 'id');
    }
}
