<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Suport\Facades\Storage;

class PostsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $posts = Post::orderBy('created_at', 'desc')->paginate(5);
		$posts = Post::paginate(8);

		return view('posts.index')->with('posts', $posts);
		// $posts = Post::all();
		// return response()->json($posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|unique:posts,title',
			'body' => 'required',
			'cover_iamge' => "image|nullable|max:1999",
		]);

		if ($request->hasFile('cover_image')) {
			$fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
			$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
			$fileExt = $request->file('cover_image')->getClientOriginalExtension();
			$fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
			$path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		} else {
			$fileNameToStore = 'noimage.jpg';
		}

		$post = new Post;
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		$post->user_id = auth()->user()->id;
		$post->cover_image = $fileNameToStore;

		$post->save();
		return redirect('/posts')->with('succes', 'Post Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$post = Post::find($id);
		//$comments = $post->comments()->where('post_id', $id)->get();
		
		//$comments = $post->comments;
		//return view('posts.show', compact('post', 'comments'));
		return view('posts.show')->with(['post' => $post, 'comments' => $post->comments]);

		// return response()->json($post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		// $post = Post::whereId($id)->firstOrFail();
		$post = Post::find($id);

		if (auth()->user()->id !== $post->user_id) {
			return redirect("/posts/{$id}")->with('post', $post);
		}

		return view('posts.update', compact('post'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'cover_iamge' => "image|nullable|max:1999",

		]);

		if ($request->hasFile('cover_image')) {
			$fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
			$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
			$fileExt = $request->file('cover_image')->getClientOriginalExtension();
			$fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
			$path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		}

		$post = Post::find($id);
		$post->title = $request->input('title');
		$post->body = $request->input('body');
		if ($request->hasFile('cover_image')) {
			$post->cover_image = $fileNameToStore;
		}
		$post->save();
		return redirect('/posts')->with('succes', 'Post Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$post = Post::whereId($id)->firstOrFail();

		if (auth()->user()->id !== $post->user_id) {
			return redirect("/posts/{$id}")->with(['post' => $post, 'status' => 'You cannot delete this post ):']);
		}

		if ($post->cover_iamge != 'noimage.jpg') {
			Storage::delete('public/cover_images/' . $post->cover_image);
		}

		$post->delete();
		return redirect('/posts')->with('error', 'The post ' . $id . ' has been deleted!');
	}
}

//, 'error' => 'You cannot delete this post ):']
