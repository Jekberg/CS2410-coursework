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
		const data = {};
		if(requestData.query)
			data.query = requestData.query;
		if(requestData.from)
			data.from = requestData.from;
		if(requestData.to)
			data.to = requestData.to;
		return {
			url: "{{route('query.events')}}",
			type: "GET",
			data: data
		};
	}
</script>
