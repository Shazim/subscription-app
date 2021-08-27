<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
      'website_id',
      'title',
      'description',
    ];

    public function website()
    {
      return $this->belongsTo(Website::class);
    }

    public static function boot()
    {
      parent::boot();

      self::created(function($post)
      {
        $users = $post->website->users;
        foreach($users as $user) {
          // Send Subscribe Notification to each user
          Mail::to($user->email)->queue(new \App\Mail\Subscribe($post));
        }
      });
    }
}
