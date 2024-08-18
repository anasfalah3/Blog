<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id','title','slug','body','image','user_id','published_at','featured'];
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());
    }
    public function scopeFeatured($query){
        $query->where('featured',true);
    }
    public function scopeWithCategory($query, string $category){

        $query->whereHas('categories',function ($query) use ($category){
                $query->where('slug',$category);
            });
    }
    public function getExcerpt() {
        return substr(strip_tags($this->body), 0, 200) . '...';
    }
    public function getReadingTime() {
        $words = str_word_count(strip_tags($this->body));
        $minutes = ceil($words / 200);
        return $minutes . ' min read';
    }
    public function getThumbnailUrl() {
       $isUrl = str_contains($this->image,'http');
       return $isUrl ? $this->image : Storage::disk('public')->url($this->image);
    }
}
