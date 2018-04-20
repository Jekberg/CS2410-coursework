<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use App\Event;
use App\Image;

/**
 * The {@code EventController} is a {@link Controller} class which is
 * responsible for handling pages which are associated with events.
 */
class EventController extends Controller
{
	/**
	 * Get the page which displays all events.
     *
     * @return The 'events' view.
	 */
    public function all()
	{
		return view('events');
	}
	/**
	 * Redirect to the 'list.event' route.
     *
	 * <p>
     *      The URL parameter will be perserved in the redirect.
     * </p>
     *
     * @param $request The request sent from the client.
     * @return The result of calling the 'list.events' route.
	 */
	public function lookFor(Request $request)
	{
		return redirect()->route('list.events', array(
                'query' => $request->input('query')));
	}
	/**
	 * Get the page which displays a single event.
	 *
     * <p>
     *      The event must exist.
     * </p>
     *
     * @param $id The id of the event.
     * @return The 'view' view if the event exists, otherwise, the 'error' view
     *          is returned.
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
	 * Get the page for adding a new event.
	 *
	 * @return The 'newevent' view.
	 */
	public function new()
	{
		return view('newevent');
	}
	/**
	 * Get the page for modifying an existing event.
     *
     * <p>
     *      The event must be existing and the current user must have access to
     *      edit the event.
     * </p>
     *
	 * @param $id The id of the event to edit.
	 * @return The 'edit' view if the current user has access to editing the
     *          <code>$id</code> and the event exists, otherwise, return the
     * 'error' view.
	 */
	public function modify($id)
	{
        $event = Event::find($id);
        if(!isset($event))
            return view('error', array(
                    'message' => "Looks like the event you are trying to edit "
                            . "does not exist, maybe you are looking for "
                            . "something else?"));
        if(Gate::allows('event-edit-access', $event))
		      return view('edit', array('event' => $event));
        else
            return view("error", array(
                    'message' => "Sorry! You cannot edit this event because "
                                . "this event does not belong to you. Stealing "
                                . "is not the right thing to do, but you could "
                                . "always create your own event and edit it "
                                . "until your heart's content! :)"));
	}
}
