<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function getId() { return $this->attributes['id']; }
    public function getName() { return $this->attributes['name']; }
    public function getAuthor() { return $this->attributes['author']; }
    public function getTopic() { return $this->attributes['topic']; }
    public function getYear() { return $this->attributes['year']; }
    public function getPicture() { return $this->attributes['picture']; }
    public function getCreatedAt() { return $this->attributes['created_at']; }
    public function getUpdatedAt() { return $this->attributes['updated_at']; }

    public function setId($id) { $this->attributes['id'] = $id; }
    public function setName($name) { $this->attributes['name'] = $name; }
    public function setAuthor($author) { $this->attributes['author'] = $author; }
    public function setTopic($topic) { $this->attributes['topic'] = $topic; }
    public function setYear($year) { $this->attributes['year'] = $year; }
    public function setPicture($picture) { $this->attributes['picture'] = $picture; }
    public function setCreatedAt($created_at) { $this->attributes['created_at'] = $created_at; }
    public function setUpdatedAt($updated_at) { $this->attributes['updated_at'] = $updated_at; }

    public function usersBook(): HasMany{
        return $this->hasMany(UserBook::class);
    }
    public function getUsersBook(){
        return $this->usersBook;
    } 
}
