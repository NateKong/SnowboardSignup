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
/*	
function add(person){
	$.post('php/add.php', person, function(data, status){
		document.getElementById("mySQLData").innerHTML = data;
	})fail(function() {
		document.getElementById("mySQLData").innerHTML = 'error';
	});
}*/