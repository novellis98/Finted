<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\JoinUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        $message = __('ui.ArticleAccepted');
        return redirect()->back()->with('message', $message);
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        $message = __('ui.ArticleRejected');
        return redirect()->back()->with('message', $message);
    }

    public function becomeRevisor()
    {
        Mail::to('d69585a77b-c5f5d1+1@inbox.mailtrap.io')->send(new JoinUsMail(Auth::user()));
        $message = __('ui.EmailSentSuccessfully');
        return redirect(route('home'))->with('message', $message);
    }

    public function makeRevisor($email)
    {
        if (!$email) {
            $error = __('ui.UserNotFound');
            return redirect()->back()->with('error', $error);
        }

        Artisan::call('app:make-user-revisor', [
            'email' => $email,
        ]);
        $message = __('ui.UserPromotedToReviewer');
        return redirect()->back()->with('message', $message);
    }
}
