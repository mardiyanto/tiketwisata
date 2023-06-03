$(document).ready(function() { 
	$('#upload_form').submit(function(e) {	
		if($('#upload').val() != "") {
			e.preventDefault();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({ 
				target: '#targetLayer',
				beforeSubmit: function() {
				$("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentageComplete){	
					$("#progress-bar").width(percentageComplete + '%');
					$("#progress-bar").html("<label style='color:#fff;'>Complete</label>");
				},
				 success:function(){
					$('#targetLayer').show();
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 