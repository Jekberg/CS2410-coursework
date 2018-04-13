/**
 * ...
 * 
 * @file	validate_date.js
 * @author 	159014260 John Berg
 * @since	31/03/2018
 */
/**
 * Check if two string which represents a date and time respectively, when
 * combined represent a date and time which is after the current date and time.
 * 
 * @param date The string which represents the calender date of the date to be
 * 			validated.
 * @param time The string which represents the time of the <code>date</code>.
 * @return <code>null</code> if no errors are detected, otherwise, returns a
 * 			string which describes the error.
 */
export function validate(date, time)
{
	const d = new Date(date + "T" + time);
	if(isNaN(d))
		return "Date is not correct!";
	return d < Date.now()
			? "The time and date must be after today"
			: null;
}