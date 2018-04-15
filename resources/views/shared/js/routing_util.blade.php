<script>
	/**
	 * Set the href to be the the route to the view for a specified event.
	 * 
	 * @param id The id of the event to view.
	 */
	function viewEvent(id)
	{
		window.location.href =  "{{route('view.event', ':id')}}".replace(":id", id);
	}
</script>