<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts.user', [
            'user' => auth()->user(),
            'ideas' => Idea::all(),
            'spam_ideas' => User::join('ideas', 'users.id', '=', 'ideas.user_id')
                ->where('ideas.spam_reports', '>', 0)
                ->get(['users.*', 'ideas.*']),
            'categories' => Category::all()
        ]);
    }

    public function update_user(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|string|max:255',
            'about' => 'nullable|min:4',
        ]);

        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        session()->flash('success_message_user', 'Korisnički podaci su ažurirani!');

        return redirect()->back();
    }

    public function update_category(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|string|max:20',
        ]);

        $categoryId = $request->categoryId;
        $category = Category::findOrFail($categoryId);

        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('success_message_category', 'Naziv kategorije je ažuriran!');

        return redirect()->back();
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|string|max:20',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/user')->with('success_message_user', 'Kategorija je uspješno kreirana!');
    }

    public function delete_category(Request $request)
    {
        $categoryId = $request->categoryId;

        Idea::where('category_id', $categoryId)->delete();

        Category::destroy($categoryId);

        return redirect('/user')->with('success_message_user', 'Kategorija je uspješno izbrisana!');
    }
}
