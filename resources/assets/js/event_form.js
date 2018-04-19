const $ = require("jquery");

$(document).ready(function ()
{
	$("#event-form").submit(function (event)
	{
		console.log("Submitting form.");
		$("#category-hidden").val($("#category-input").val());
		return true;
	});
});
