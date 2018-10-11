<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
	public function index() {
		$title = "Welcome To Laravel";
		//return view('pages.index', compact('title'));
		return view('pages.index')->with('title', $title);
	}

	public function about() {
		return view('pages.about');
	}

	public function service() {
		$data = array('title' => 'Title', 'services' => ['web Designe', 'Programing', 'SEO'],

		);
		return view('pages.service')->with($data);
	}

	// public function posts_index()
	// {
	//     return view('posts.index');
	// }

	// public function create_index()
	// {
	//     return view('posts.create');
	// }

}
