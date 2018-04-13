const $ = require("jquery");

$(document).ready(function ()
{
	$("#main-table").click(function (event)
	{
		viewEvent(event.target.parentElement.getAttribute("value"));
	});
});