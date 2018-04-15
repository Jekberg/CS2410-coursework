<script>
	/**
	 * Prepare the JSON object for an AJAX request to get all the events form
	 * the get_events API.
	 * 
	 * @param requestData The data to send to the API.
	 * @return The JSON object which will be used in a Jquery AJAX request.
	 */
	function prepareGetEventsRequest(requestData)
	{
		return {
			url: "{{route('get.events')}}",
			type: "GET",
			data: requestData
		};
	}
</script>
