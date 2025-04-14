<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateArticleForm extends Component
{
    #[Validate("required|min:5")]
    public $title;
    #[Validate("required|min:10")]
    public $description;
    #[Validate("required|numeric|min:0")]
    public $price;
    #[Validate("required")]
    public $category;
    public $article;
    public $categories;

    public function render()
    {
        return view('livewire.update-article-form');
    }
    public function mount($articleId)
    {
        $this->categories = Category::all();

        if ($articleId) {
            $this->article = Article::find($articleId);
            $this->title = $this->article->title;
            $this->description = $this->article->description;
            $this->price = $this->article->price;
            $this->category = $this->article->category_id;
        }
    }
    public function update()
    {
        $this->validate();
        $this->article->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
        ]);
        $message = $message = __('ui.ArticleModifiedSuccessfully');

        return redirect('/articles')->with('message', $message);
    }
}
