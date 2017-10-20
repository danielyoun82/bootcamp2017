$(document).ready(function(){
$("#submit").click(function(){
var itemID = $("#itemID").val();
var dataString = 'itemID1='+ itemID;
if(itemID==''){
	alert("Please Fill in Item ID Field");
}
else{
	// AJAX Code To Submit Form.
	$.ajax({
	type: "POST",
	url: "ajaxsubmit.php",
	data: dataString,
	cache: false,
	success: function(result){
		//document.getElementById("result").innerHTML = result;
		window.location.reload();
	}});
}
return false;
});
});
