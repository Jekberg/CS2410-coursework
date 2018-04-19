<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Event;
use App\Image;

class EventController extends Controller
{
	/**
	 *
	 *
	 */
    public function all()
	{
		return view('events');
	}
	/**
	 *
	 *
	 */
	public function lookFor(Request $request)
	{
		return redirect()->route('list.events', array(
                'query' => $request->input('query')));
	}
	/**
	 *
	 *
	 */
	public function view($id)
	{
        $event = Event::find($id);
        if(isset($event))
		      return view('view', array('event' => $event));
        return view('error', array(
                'message' => "The event you are looking for does not exist it "
                        . "seems... Perhaps you are looking for something else "
                        . "or the event has been removed by the organiser."));
	}
	/**
	 *
	 *
	 * @return The 'newevent' view.
	 */
	public function makeNew()
	{
		return view('newevent');
	}
	/**
	 *
	 *
	 * @return The 'newevent' view.
	 */
	public function modify($id)
	{
        $event = Event::find($id);
        if(!isset($event))
            return view('error', array(
                    'message' => "Looks like the event you are trying to edit "
                            . "does not exist, maybe you are looking for "
                            . "something else?"));
        if(Gate::allows('event-ownership', $event))
		      return view('edit', array('event' => $event));
        else
            return view("error", array(
                    'message' => "Sorry! You cannot edit this event because "
                                . "this event does not belong to you. Stealing"
                                . "is not the right thing to do, but you could "
                                . "always create your own event and edit it "
                                . "until your heart's content! :)"));
	}
}
