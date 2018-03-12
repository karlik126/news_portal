$(document).ready(function () {
    jQuery('#textArea').autoResize({
        animate:false,
        extraSpace:5
    });
   /* $("#textArea").click(function(){
        $('.fotoComent').css('display','inline-block');
        $('.buttonComent').css('display','inline-block');
    });
    $('#textArea'). change(function () {
        if($("#textArea").text().length==0){
            $('.fotoComent').css('display','none');
            $('.buttonComent').css('display','none');
        }});*/
    $('#textArea').on('click', function () {
        $('.fotoComent').css('display', 'inline-block');
        $('.buttonComent').css('display', 'inline-block');
    });
    $('#textArea').focusout(function () {
        if($("#textArea").val().length==0){
            $('.fotoComent').css('display','none');
            $('.buttonComent').css('display','none');
        }else{
            $('.fotoComent').css('display','inline-block');
            $('.buttonComent').css('display','inline-block');
        }
    });

})


