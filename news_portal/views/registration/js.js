$("Document").ready(function(){
    $("#1_input").on("input",function(){   //проверка логина
        if(/^[A-Za-z0-9._-]*$/.test($.trim($("#1_input").val()))){
           $('#1_div').text("");
        }else {
            $('#1_div').text("Логин может содержать только большие и маленькие буквы латинского алфавтьа,точки,тире,цифры и нижнее подчеркивания.");
        }
        if(/^[\S\s]{6,30}$/.test($.trim($("#1_input").val()))){
            $('#2_div').text("");
        }else {
            $('#2_div').text("Логин должен содержать от 6 до 30 символов.");
        }
    });
    $("#2_input").on("input",function(){ //проверка имени
        if(/^[A-Za-z0-9-_]*$/.test($.trim($("#2_input").val()))){
            $('#3_div').text("");
        }else {
            $('#3_div').text("Имя может содержать только большие и маленькие буквы латинского алфавита,цифры,тире и нижнее подчеркивания.");
        }
        if(/^[\S\s]{4,30}$/.test($.trim($("#2_input").val()))){
            $('#4_div').text("");
        }else {
            $('#4_div').text("Имя должен содержать от 4 до 30 символов.");
        }

    });
    //--------------------------------------------- пароли
    var password_check_1,password_check_2,password_check_3;
    $("#3_input,#4_input").on("input",function () {
        if(/^[A-Za-z0-9-_]+$/.test($.trim($("#3_input").val()))){
            $("#1").css('color','green')
            $("#badge1").text("✔");
            password_check_1=true;
        }else{
            $(".kek").css('display','block');
            $("#badge1").text("✗");
            $("#1").css('color','red');
            password_check_1=false;
        }
        if(/^[\s\S]{6,30}$/.test($.trim($("#3_input").val()))){
            $("#2").css('color','green');
            $("#badge2").text("✔");
            password_check_2=true;
        }else{
            $(".kek").css('display','block');
            $("#badge2").text("✗");
            $("#2").css('color','red');
            password_check_2=false;
        }
        if($.trim($("#3_input").val())==$.trim($("#4_input").val()) && $.trim($("#3_input").val())!=''){
            $("#3").css('color','green');
            $("#badge3").text("✔");
            password_check_3=true;
        }else{
            $(".kek").css('display','block');
            $("#3").css('color','red');
            $("#badge3").text("✗");
            password_check_3=false;
        }
        if(password_check_1 && password_check_2 && password_check_3){
            $(".kek").css('display','none');
        }
        var str=$.trim($("#3_input").val());
        var poisk,result;
        if($.trim($("#3_input").val()).length>=4){ //проверка схожести с логином
            for (i = 0; i < str.length-4+1; i++) {
                poisk=str.substr(i,4);
                result=$.trim($("#1_input").val()).indexOf(poisk);
                if(result==-1){
                    $("#badge4").text("✔");
                    $("#4").css('color','green');
                }else{
                    $(".kek").css('display','block');
                    $("#badge4").text("✗");
                    $("#4").css('color','red');
                    break;
                }
            }
        }

    });
    $(document).click(function () {
        if ($(event.target).closest("#3_input,#4_input").length && (!password_check_1 || !password_check_2 || !password_check_3)) {
            $(".kek").css('display','block');
        }else{
            $(".kek").css('display','none');
        }
    });

   //---------------------------------------------
   //проверка мыла


    $("#5_input").on("input",function(){
        if(/^[0-9A-Za-z._-]{1,30}@[A-Z0-9a-z-.]+[0-9A-Za-z]{1,1}\.[a-z]{2,6}$/.test($.trim($("#5_input").val()))){
            $('#5_div').text("");
        }else {
            $('#5_div').text("Эмейл введен некоректно.");
        }

    });
});



