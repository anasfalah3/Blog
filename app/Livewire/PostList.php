<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';
    #[Url()]
    public $search = '';
    #[Url()]
    public $category = '';
    #[Url()]
    public $popular = false;

    public function setSort($sort){
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->resetPage();
    }
    
    #[On('search')]
    public function updateSearch($search){
        $this->search = $search;
    }
    public function clearFilter() {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }
    #[Computed()]
    public function posts(){
        return Post::published()
            ->with('author','categories','likes')
            // ->withCount('likes')
            ->when($this->activeCategory,function($query){
                $query->withCategory($this->category);
            })
            ->when($this->popular,function($query){
                $query->popular();
            })
            ->search($this->search)
            ->orderBy('published_at', $this->sort)
            ->paginate(5);
    }
    #[Computed()]
    public function activeCategory(){
        if($this->category === null || $this->category === ''){
            return null;
        }else{
            return Category::where('slug', $this->category)->first();
        }
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
