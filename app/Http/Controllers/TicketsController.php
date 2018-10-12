<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		
		$tickets = Ticket::paginate(5);
		return view('tickets.index', compact('tickets'));
		
		//return view('tickets.index')->with('tickets', $tickets);
		//return view('tickets.index', ['tickets'=> $tickets]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('tickets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(TicketFormRequest $request) {
		$slug = uniqid();
		$ticket = new Ticket(array(
			'title' => $request->get('title'),
			'content' => $request->get('content'),
			'slug' => $slug,
		));

		$ticket->save();
		return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: ' . $slug);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		$comments = $ticket->comments()->get();
		return view('tickets.show', compact('ticket', 'comments'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editor($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		return view('tickets.edit', compact('ticket'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(TicketFormRequest $request, $slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		$ticket->title = $request->get('title');
		$ticket->content = $request->get('content');
		if ($request->get('status') != null) {
			$ticket->status = 0;
		} else {
			$ticket->status = 1;
		}

		$ticket->save();
		// return redirect(action('TicketsController@editor', $ticket->slug))->with('status', 'The ticket '.$id.' has been updated!' );
		// return  redirect()->route('TicketsController@editor', $ticket->slug)->with('status', 'The ticket '.$id.' has been updated!' );
		return redirect()->refresh()->with('status', 'The ticket '.$slug.' has been updated!' );

		/** force user to download file **/
		// $filepath = public_path(). "\pdf\pdf.pdf";
		// $filename = "What's in the box.pdf";
		// return response()->download($filepath, $filename);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($slug) {
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		$ticket->delete();
		return redirect('/tickets')->with('status', 'The ticket ' . $slug . ' has been deleted!');
	}
}
