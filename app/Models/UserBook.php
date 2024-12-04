<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserBook extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
    * USER ATTRIBUTES
    * $this->attributes['id'] - int - contains the primary key (id)
    * $this->attributes['user_id'] - int - contains the user id reference
    * $this->attributes['book_id'] - int - contains the book id reference
    * $this->attributes['expires_at'] - timestamp - contains the expire date to give back the book
    * $this->attributes['status'] - int - contains if the book is still borrowed or not
    * $this->attributes['created_at'] - timestamp - contains the user creation date
    * $this->attributes['updated_at'] - timestamp - contains the user update date
    */
    
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }
    public function getBookId()
    {
        return $this->attributes['book_id'];
    }
    public function setBookId($book_id)
    {
        $this->attributes['book_id'] = $book_id;
    }
    public function getExpiresAt()
    {
        return $this->attributes['expires_at'];
    }
    public function setExpiresAt($expires_at)
    {
        $this->attributes['expires_at'] = $expires_at;
    }
    public function getStatus()
    {
        return $this->attributes['status'];
    }
    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(User::book);
    }
}