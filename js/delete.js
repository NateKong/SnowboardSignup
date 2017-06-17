/*****   GET INFO   *****/
var name;

$("#mySQLData").on('click', 'button.btn.red', function(){
		var id = this.id;
		substr = id.substring(6,id.length);
		name = document.getElementById("name" + substr).innerHTML;
		deletePerson();
});



/*****   AJAX POST   *****/
function deletePerson(){
	var json = { 'name': name};
	//alert(json['name']);
	$.post('../php/delete.php', json, function(data, status){
		document.getElementById("mySQLData").innerHTML = data;
		checkbox();
	}).fail(function() {
		document.getElementById("mySQLData").innerHTML = 'error';
	});
}