<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinUsRequest;
use App\Mail\JoinUsMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::where("is_accepted", true)->orderByDesc('created_at')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function articles()
    {
        return view('articles');
    }
    public function joinUsMail(JoinUsRequest $request)
    {
        $name = $request->name;
        $last_name = $request->last_name;
        $email = $request->email;
        $message_user = $request->message_user;

        $userData = compact('name', 'last_name', 'email', 'message_user');
        Mail::to('admin@mail.io')->send(new JoinUsMail($userData));
        $message = __('ui.EmailSentSuccessfully');
        return redirect(route('home'))->with('message', $message);
    }
    public function JoinUs()
    {
        return view('joinUs.create');
    }

    // public function searchArticles(Request $request)
    // {
    //     $query = $request->input('query');
    //     $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
    //     return view('article.searched', ['articles' => $articles, 'query' => $query]);
    // }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        // Cerca articoli con parole parzialmente corrispondenti
        $articles = Article::where('is_accepted', true)
            ->where('title', 'LIKE', '%' . $query . '%') // Cerca nel titolo
            ->orWhere('description', 'LIKE', '%' . $query . '%') // Cerca nel contenuto
            ->paginate(10);

        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
