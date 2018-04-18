const $ = require("jquery");
const dateValidator = require("./validate_date");

$(document).ready(function ()
{
	$("#event-form").submit(function (event)
	{
		console.log("Submitting form.");
		const formElements = event.target.elements;
		(function (str)
		{
			if(str != null)
				alert(str);
			else
			{
				$("#category-hidden").val($("#category-input").val());
				event.target.submit();
			}
		})(dateValidator.validate(
				formElements["date"].value,
				formElements["time"].value));
		return false;
	});
});
