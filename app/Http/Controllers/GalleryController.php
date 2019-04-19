<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'pictures_urls' => 'required|array|min:1',
            'pictures_urls.*' => 'url'
        ]);

        $data = $request->only(['name', 'description', 'pictures_urls']);
        $data['user_id'] = auth()->user()->id;

        $gallery = Gallery::create($data);

        return $gallery->id;
    }

    public function get($id)
    {
        $gallery = Gallery::with(['comments.creator', 'user'])->findOrFail($id);

        return $gallery;
    }

    public function delete(int $id)
    {
        $user = auth()->user();
        $gallery = $user->galleries()->where('id', $id)->first();

        if (empty($gallery)) {
            throw new NotFoundHttpException('Your gallery with id ' . $id . " doesn't exist.");
        }

        $gallery->delete();
    }

    public function update(int $id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'pictures_urls' => 'required|array|min:1',
            'pictures_urls.*' => 'url'
        ]);

        $user = auth()->user();
        $gallery = $user->galleries()->where('id', $id)->first();

        if (empty($gallery)) {
            throw new NotFoundHttpException('Your gallery with id ' . $id . " doesn't exist.");
        }

        $inputs = $request->all();

        $gallery->update($inputs);

        return $gallery;
    }

    public function index(Request $request)
    {
        $query = Gallery::with(['comments', 'user'])->join('users', 'galleries.user_id', '=', 'users.id');

        if (!empty($request['term'])) {
            $query->where('name', 'LIKE', '%' . $request['term'] . '%')
                ->orWhere('description', 'LIKE', '%' . $request['term'] . '%')
                ->orWhere('first_name', 'LIKE', '%' . $request['term'] . '%')
                ->orWhere('last_name', 'LIKE', '%' . $request['term'] . '%');
        }

        if (!empty($request['user_id'])) {
            $query->where('user_id', $request['user_id']);
        }

        return $query->select('galleries.*')->orderBy('created_at', 'desc')->paginate(10);
    }
}
