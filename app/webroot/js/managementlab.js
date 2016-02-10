$('document').ready(function(){
	$(".datepicker").datepicker();
    
	//Todo List
	$('.finish').click(function(){
		$(this).parent().toggleClass('finished');
		$(this).toggleClass('fa-square-o');

		//Chiamata ajax a complete
		$.ajax({
            type: 'POST',
            url: 'http://localhost/managementlab/tasks/complete/' + $(this).attr('task_id'),            
            cache: false,
            success: function (html){
                $(this).prop("checked", !$(this).prop("checked"));
            },
			error: function(e) {
				alert("An error occurred: " + e.responseText.message);
				console.log(e);
        	}
		});
	
	});
});