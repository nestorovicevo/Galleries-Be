<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Gallery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{
    public function store(Request $request, $galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);
        $this->validate($request, Comment::STORE_RULES);

        $data = $request->only(['text']);
        $data['creator_id'] = auth()->user()->id;

        $comment = $gallery->comments()->create($data);

        return $comment;
    }

    public function delete(int $id)
    {
        $user = auth()->user();
        $comment = $user->comments()->where('id', $id)->first();

        if (empty($comment)) {
            throw new NotFoundHttpException('Your comment with id ' . $id . " doesn't exist.");
        }

        $comment->delete();
    }
}
