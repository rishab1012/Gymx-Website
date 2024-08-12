
$(document).ready(function(){
    $('#header').load("navbar.html");
 });



var today = new Date();
var todayISOString = new Date("1950-01-01").toISOString().split('T')[0];
document.getElementById("trainer_dob").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2012-01-01").toISOString().split('T')[0];
document.getElementById("trainer_dob").setAttribute("max", todayISOString);

var today = new Date();
var todayISOString = new Date("1950-01-01").toISOString().split('T')[0];
document.getElementById("input").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2012-01-01").toISOString().split('T')[0];
document.getElementById("input").setAttribute("max", todayISOString);