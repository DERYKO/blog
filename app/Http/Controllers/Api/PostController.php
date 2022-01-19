<?php

namespace App\Http\Controllers\Api;

use App\Data\Post;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function feed(Request $request)
    {
        $posts = Post::with('user:id,name,created_at')
            ->orderBy('id', $request->input('dir', 'desc'))
            ->paginate($request->input('per_page', 10));
        return \response()->json(['data' => $posts, 'message' => 'Fetch successful'], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('user:id,name,created_at')
            ->where('user_id', $request->user()->id)
            ->orderBy('id', $request->input('dir', 'desc'))
            ->paginate($request->input('per_page', 20));
        return \response()->json(['data' => $posts, 'message' => 'Fetch successful'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Invalid data provided!'], 422);
        }
        Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'publication_date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Post created successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::with('user:id,name')->findOrFail($id);
        return \response()->json(['data' => $post, 'message' => 'Fetch successful']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
