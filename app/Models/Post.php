<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());
    }
    public function scopeFeatured($query){
        $query->where('featured',true);
    }
    public function getExcerpt() {
        return substr(strip_tags($this->body), 0, 200) . '...';
    }
    public function getReadingTime() {
        $words = str_word_count(strip_tags($this->body));
        $minutes = ceil($words / 200);
        return $minutes . ' min read';
    }
}
