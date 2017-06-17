$(document).ready(function(){
	$("button.btn.green").hide();
});	

/*****   VALDIATE FORM   *****/
var validName = false;
var validDate = false;
var validPass = false;
var name, bday, pass;

$('input#name').focusout( function(){
	name = document.getElementById('name').value;
	if ( !/^[a-zA-Z\s]+$/.test(name) ){
 		validName = false;
		submit();
 	}else{
		validName = true;
		submit();
 	}
});

$('input#bday').focusout( function(){
	bday = document.getElementById('bday').value;
	if (bday == ''){
		validDate = false;
 		submit();
 	}else{
		validDate = true;
		submit();
 	}
});

$('select').change( function(){
	pass = $('#pass option:selected').text();
	validPass = true;
	submit();
});

function submit(){
	if(validName && validDate && validPass){
		$("button.btn.green").show();
	}else{
		$("button.btn.green").hide();
	}
}


/*****   AJAX POST   *****/

function addPerson(){
	var json = { 'name': name, 'date': bday, 'pass': pass};
	$.post('../php/add.php', json, function(data, status){
		if (data == "Error: Duplicate Name"){
			alert("Error: Duplicate Name");
		}else{
			document.getElementById("mySQLData").innerHTML = data;
			$("input[type=text]").val("");
			$("input[type=date]").val("");
			$("#pass option").prop("selected", function(){
				return this.defaultSelected;
			});
			$("button.btn.green").hide();
			checkbox();
		}
	}).fail(function() {
		document.getElementById("mySQLData").innerHTML = 'error';
	});
}