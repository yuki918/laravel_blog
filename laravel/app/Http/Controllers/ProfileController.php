<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Like;
use App\Models\Comment;

class ProfileController extends Controller
{

    public function comment(): View
    {
        $comment = Article::with('article_category')->where('is_public', '=', '1')
                        ->withWhereHas('comment', function ($query) {
                            $query->where('user_id', '=', Auth::id());
                        })->orderBy('created_at', 'desc')->paginate(10);
        $categories = ArticleCategory::all();
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        return view('comment', compact('comment', 'categories', 'new',));
    }

    public function dashboard(): View
    {
        $like = Article::with('article_category')->where('is_public', '=', '1')
                        ->withWhereHas('like', function ($query) {
                            $query->where('user_id', '=', Auth::id());
                        })->orderBy('created_at', 'desc')->paginate(10);
        $categories = ArticleCategory::all();
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', compact('like', 'categories', 'new',));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $categories = ArticleCategory::all();
        $new = Article::with('article_category')->where('is_public', '=', '1')->orderBy('created_at', 'desc')->paginate(10);
        return view('profile.edit', ['user' => $request->user(), 'categories' => $categories, 'new' => $new, ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
