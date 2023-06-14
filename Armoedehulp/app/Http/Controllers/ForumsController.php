<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Session;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // session()->forget(["Forum1", "Forum2", "Forum3", "Forum4", "Forum5"]);

        $forums = Forum::orderBy('created_at', 'desc')->get();
        $popForums = Forum::orderBy('punten', 'desc')->get();
        return view('forums.index', ['forums' => $forums, 'popForums' => $popForums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Forum::create($request->validate([
            'titel' => 'required|max:35',
            'bericht' => 'required|max:20000',
        ]));
        
        return redirect()->route('forums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($forum)
    {
        $forum = Forum::find($forum);
        return view('forums.show', ['forum' => $forum]);
    }

    /**
     * Change the specified resource in the database.
     */
    public function update($forum, Request $request)
    {
        $forum = Forum::find($forum);

        if (session::get("Forum$forum->id") == $request['punten']) {
            return redirect()->route('forums.show', ['forum' => $forum]);
        }

        if ($request['punten'] == "upvote") {
            $forum->punten += 1;
            if (session::get("Forum$forum->id") == "downvote") {
                $forum->punten += 1;
            }
        }
        else {
            $forum->punten -= 1;
            if (session::get("Forum$forum->id") == "upvote") {
                $forum->punten -= 1;
            }
        }
        $forum->save();

        session::put("Forum$forum->id", $request['punten']);

        return redirect()->route('forums.show', ['forum' => $forum]);
    }

    /**
     * Display the most upvoted resource.
     */
    public function home()
    {
        $forum = Forum::orderBy('punten', 'DESC')->first();
        return view('home', ['forum' => $forum]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($forum)
    {
        Forum::destroy($forum);
        return redirect()->route('forums.index');
    }
}
