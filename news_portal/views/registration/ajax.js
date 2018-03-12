$("Document").ready(function(){
    $("#1_input").on("input",function(){
        var value = $(this).val();
        $.ajax({
            type:'POST',
            url:'registration/checkLogin',
            data:'login='+value,
            success:function(msg) {
                if (msg=='valid'){
                    $('#11_div').html("");
                 }else if(msg=='invalid') {
                     $('#11_div').html('Данный логин уже зарегестрирован!');
                 }
            }});
    });

    $("#5_input").on("input",function(){
        var value = $(this).val();
        $.ajax({
            type:'POST',
            url:'registration/checkMail',
            data:'mail='+value,
            success:function(msg) {
                if (msg=='valid'){
                    $('#22_div').html("");
                }else if(msg=='invalid') {
                    $('#22_div').html('Данный эмейл уже зарегестрирован!');
                }
            }});
    });






});
