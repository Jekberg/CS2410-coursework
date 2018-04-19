const $ = require("jquery");
const urlParam = require("./url_param");

/**
 * The map of selectable options in a drop-down menu, and their corresponding
 * function for sorting a list of events.
 */
const SORT_BY = {
	/**
	 * Do nothing to the list.
	 */
	"no-order": function (data)
	{
		return data;
	},
	/**
	 * Sort the list by comparing the name of the events.
	 */
	"name-asc": function (data)
	{
		return data.sort(function (a, b)
		{
			if(a.name > b.name)
				return 1;
			else if(b.name > a.name)
				return -1;
			else
				return 0;
		});
	},
	/**
	 * Sort the list by comparing the name of the events in revers order.
	 */
	"name-desc": function (data)
	{
		return data.sort(function (a, b)
		{
			if(a.name > b.name)
				return -1;
			else if(b.name > a.name)
				return 1;
			else
				return 0;
		});
	},
	/**
	 * Sort the list by comparing the likes of the events.
	 */
	"like-asc": function (data)
	{
		return data.sort(function (a, b)
		{
			return a.likes - b.likes;
		});
	},
	/**
	 * Sort the list by comparing the likes of the events in revers order.
	 */
	"like-desc": function (data)
	{
		return data.sort(function (a, b)
		{
			return b.likes - a.likes;
		});
	},
	/**
	 * Sort the list by comparing the dates of the events.
	 */
	"date-asc": function (data)
	{
		return data.sort(function (a, b)
		{
			return new Date(a.date + "T" + a.time)
					- new Date(b.date + "T" + b.time);
		});
	},
	/**
	 * Sort the list by compering the dates of the events in the reverse order.
	 */
	"date-desc": function (data)
	{
		return data.sort(function (a, b)
		{
			return new Date(b.date + "T" + b.time)
					- new Date(a.date + "T" + a.time);
		});
	}
};

/**
 * Filter and sort a list of JSON events.
 *
 * <p>
 * Filter the data based on checked check-boxes and sort the filtered list
 * according to the selected value of a drop-down menu.
 * </p>
 *
 * @param data The list of events to filter and sort.
 * @return The filtered and sorted list of events.
 */
function orderAndFilter(data)
{
	return SORT_BY[$("#order-select").val()](data
			.filter(e => !$("#filter-sport").is(":checked")
					? e.category != $("#filter-sport").val()
					:true)
			.filter(e => !$("#filter-culture").is(":checked")
					? e.category != $("#filter-culture").val()
					:true)
			.filter(e => !$("#filter-others").is(":checked")
					? e.category != $("#filter-others").val()
					:true));
}
/**
 * Insert an array of events into the main table of the page.
 *
 * @param tableData The array of event objects to be inserted into the main
 * 			table.
 */
function insetTable(tableData)
{
	var tableContent = "";
	$.each(tableData, function (index, data)
	{
		tableContent += "<tr class = 'event-tr' value = " + data.id + ">";
		tableContent += "<td class = ' text-truncate cell-l'>" + data.name + "</td>";
		tableContent += "<td class = ' text-truncate cell-l'>" + data.description + "</td>";
		tableContent += "<td class = ' text-truncate cell-l'>" + data.date + "</td>";
		tableContent += "<td class = ' text-truncate cell-m'>" + data.time + "</td>";
		tableContent += "<td class = ' text-truncate cell-s'>" + data.likes + "</td>";
		tableContent += "</tr>";
	});
	$("#main-table").html(tableContent);
}
/**
 * Asynchronously get a list of events, and process them in a callback.
 *
 * <p>
 * This function requires a callback function which takes one array of events
 * as a parameter.
 * </p>
 *
 * @param callback The function to call when the fetching is successful.
 */
function fetchEvents(callback)
{
	console.log("Fetching events.");
	$.ajax(prepareGetEventsRequest(
	{
		query: $("#search-input").val(),
		from: $("#from-date").val(),
		to: $("#to-date").val()
	}))
	.done(function (data)
	{
		console.log("Fetch done");
		console.log(data);
		callback(JSON.parse(data.responseText));
	})
	.fail(function (data)
	{
		console.log("Fetch fail");
		console.log(data);
	});
}
/**
 * Fetch and insert events into the main table.
 *
 * <p>
 * First clear the main table, then fetch the data and insert it into the main
 * table.
 * </p>
 */
function getEvents()
{
	fetchEvents(function(data)
	{
		insetTable(orderAndFilter(data));
	});
}
$(document).ready(function ()
{
	$("#search-input").val(urlParam.getURLParam('query'));
	getEvents();
	$("#search-bar").submit(function (event)
	{
		getEvents();
		return false;
	});
	$("#filter-sport").change(function (event)
	{
		getEvents();
	});
	$("#filter-culture").change(function (event)
	{
		getEvents();
	});
	$("#filter-others").change(function (event)
	{
		getEvents();
	});
	$("#from-date").change(function (event)
	{
		getEvents();
	});
	$("#to-date").change(function (event)
	{
		getEvents();
	});
	$("#order-select").change(function (event)
	{
		getEvents();
	});
});
