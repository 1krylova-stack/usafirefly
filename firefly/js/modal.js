$(document).ready(function(){
	$('[data-toggle="modal"]').each(function(key, item){
		$(item).click(function(){
			$($(this).attr('data-target')).parent().addClass('in');
			$($(this).attr('data-target')).addClass('in');
			window.openedModal = $(this).attr('data-target');
		});
	});

	$('[data-dismiss="modal"]').click(function(){
		if(window.openedModal !== undefined){
			$(window.openedModal).modal('hide');
		}
	})

	$.prototype.modal = function(action){
		switch(action){
			case 'show':{
				console.log()
				$(this).parent().addClass('in');
				$(this).addClass('in');
				window.openedModal = '#' + $(this).attr('id');
				break;
			}
			case 'hide':{
				$(this).parent().removeClass('in');
				$(this).removeClass('in');
				window.openedModal = undefined;
				break;
			}
		}
	}
});