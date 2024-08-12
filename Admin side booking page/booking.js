var today = new Date();
var todayISOString = today.toISOString().split('T')[0];
document.getElementById("date-input").setAttribute("min", todayISOString);


var today = new Date();
today.setDate(today.getDate() + 5);
var maxDate = today.toISOString().split('T')[0];
document.getElementById("date-input").setAttribute("max", maxDate);


var today = new Date();
var todayISOString = new Date("1950-01-01").toISOString().split('T')[0];
document.getElementById("dob").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2012-01-01").toISOString().split('T')[0];
document.getElementById("dob").setAttribute("max", todayISOString);