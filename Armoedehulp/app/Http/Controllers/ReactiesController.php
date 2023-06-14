<?php

namespace App\Http\Controllers;

use App\Models\Reactie;
use Illuminate\Http\Request;
use Session;

class ReactiesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # session()->forget([1, 2, 3, 4, 5]);

        $request->validate([
            'titel'=>'required|max:35',
            'reactie'=>'required|max:10000',
            'forum_id'=>'required',
        ]);
        Reactie::create($request->only(['titel', 'reactie', 'forum_id']));

        return redirect()->route('forums.show', ['forum' => $request['forum_id']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $reactie)
    {
        $reactie = Reactie::find($reactie);

        if (session::get("reactie$reactie->id") == $request['punten']) {
            return redirect()->route('forums.show', ['forum' => $reactie->forum_id]);
        }

        if ($request['punten'] == "upvote") {
            $reactie->punten += 1;
            if (session::get("reactie$reactie->id") == "downvote") {
                $reactie->punten += 1;
            }
        }
        else {
            $reactie->punten -= 1;
            if (session::get("reactie$reactie->id") == "upvote") {
                $reactie->punten -= 1;
            }
        }
        $reactie->save();

        session::put("reactie$reactie->id", $request['punten']);
        
        return redirect()->route('forums.show', ['forum' => $reactie->forum_id]);
    }
}
