<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Request $request ) {
		if ( $request->isMethod( 'post' ) ) {
			//validations and saving

			//I did add Email and name field instead I made auth
			$request->validate( [
					'msg' => 'required|max:255'
			] );
			$msg          = new Message();
			$msg->message = $request->input( "msg" );
			$msg->user_id = auth()->user()->id;
			$msg->save();

			return redirect( "/" );
		}

		//order and sorting
		$msgs = Message::orderBy("created_at",'desc')->paginate(10);

		return view( 'msgs/msgs' )->with( "msgs", $msgs );
	}

	/*
	 * Delete Method
	 * */

	public function delete( $id ) {

		$msg = Message::find($id);
		$msg->delete();

		return redirect( "/" );
	}

}
