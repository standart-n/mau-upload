
function activate(vid) {
	$(document).ready(function(){
		$.ajax({
			url:"index.php",
			type:"GET",
			data:{
				method:"ajax",
				action:'activate',
				id:vid
			},
			dataType:"text",
			timeout:10000,
			success:function(s){
			},
			error:function(XMLHttpRequest,textStatus,error){ }
		});
	});
}


function del(vid) {
	$(document).ready(function(){
		$.ajax({
			url:"index.php",
			type:"GET",
			data:{
				method:"ajax",
				action:'del',
				id:vid
			},
			dataType:"text",
			timeout:10000,
			success:function(s){
			},
			error:function(XMLHttpRequest,textStatus,error){ }
		});
	});
}

function rename(vid,caption) {
	$(document).ready(function(){
		$.ajax({
			url:"index.php",
			type:"GET",
			data:{
				method:"ajax",
				action:'recaption',
				id:vid,
				value:caption
			},
			dataType:"text",
			timeout:10000,
			success:function(s){
			},
			error:function(XMLHttpRequest,textStatus,error){ }
		});
	});
}

$(document).ready(function(){
	$(".form-table-line input").on("keyup",function(){
		rename($(this).data('id'),$(this).val());
	});
	$(".form-table-line input").on("blur",function(){
		rename($(this).data('id'),$(this).val());
	});
});

$(document).ready(function(){
	$(".table-link-delete").on("click",function(e){
		e.preventDefault();
		$(".status-show-"+$(this).data('id')).show();
		$(".status-hide-"+$(this).data('id')).hide();
		del($(this).data('id'));		  
	});
});

$(document).ready(function(){
	$(".table-link-activate").on("click",function(e){
		e.preventDefault();
		$(".status-show-"+$(this).data('id')).hide();
		$(".status-hide-"+$(this).data('id')).show();
		activate($(this).data('id'));
	});
});

$(document).ready(function(){
	$("input").on("focus",function(){
		$(this).select();
	});
});

