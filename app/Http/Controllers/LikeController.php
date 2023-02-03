<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function update(Request $request)
    {
        $like = Like::create([
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
        ]);

        return response()->json(['success' => true]);
    }
}
