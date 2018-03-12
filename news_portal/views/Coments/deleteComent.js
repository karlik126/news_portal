function getCountComents(news_id){
    $.ajax({
        type:'POST',
        url:'../../../coments/getComentsCount',
        data: {
            'news_id':news_id},
        success:function (count) {
            alert(count);
        }});

}

function deleteComent(comentID){
    event.preventDefault();
    var newValue=parseInt($('.nowCount').val())-1;
    $('.nowCount').val(newValue);
    if(newValue==0 && $('.otherComents').val()==0){
        $('.moreComents').css('display','none');
    }
    $.ajax({
        type:'POST',
        url:'../../../coments/deleteComent',
        data: {
            "coment_id":comentID
        },
        success:function(msg) {
            if(msg=='success'){
                var clas='.'+comentID;
                $(clas).remove();
                if($('.nowCount').val()==0 && $('.otherComents').val()==0){
                    $('.nullComent').css('display','inline');
                }
            }else{
                $('.main_error').css('display','inline');
            }


        }});
}
function putComent(news_id){
    event.preventDefault();
    if($.trim($("#textArea").val())!=''){
        $.ajax({
            type:'POST',
            url:'../../../coments/addComent',
            data: {
                "news_id":news_id,
                "coment_text":$('#textArea').val()
            },
            success:function(msg) {
                if(msg=='unsuccess'){
                    $('.main_error').css('display','inline');
                }else if(msg=='success'){
                    $('#textArea').val('');
                    $('.main_error').css('display', 'none');
                    var newVar=parseInt($('.nowCount').val())+1;
                    $('.nowCount').val(newVar);

                    $.ajax({
                        type:'POST',
                        dataType:'json',
                        url:'../../../coments/UpdateComents',
                        data: {
                            "news_id":news_id,
                            "limit":$('.nowCount').val()
                        },
                        success:function(msg) {
                            $('.coment').remove();
                            for (i=0; i< msg.length; i++) {
                                if(msg[i].your_like==true){
                                    $(".allComents").append(" <div class='coment "+msg[i].coment_id+"'> <div class='author_coment_name'><a href='#'>"+msg[i].author_name+"</a></div> <div class='authorcomentText'>"+msg[i].text+"</div> <div class='comentPubData'>"+msg[i].time+"</div><a class='deleteComent' onclick='deleteComent("+msg[i].coment_id+")' href='#'>✕</a></div>");
                                }else{
                                    $(".allComents").append(" <div class='coment "+msg[i].coment_id+"'> <div class='author_coment_name'><a href='#'>"+msg[i].author_name+"</a></div> <div class='authorcomentText'>"+msg[i].text+"</div> <div class='comentPubData'>"+msg[i].time+"</div></div>");
                                }
                            }
                            $.ajax({
                                type:'POST',
                                url:'../../../coments/getComentsCount',
                                data: {
                                    'news_id':news_id},
                                success:function (count) {
                                    if(count!=0){
                                        $('.nullComent').css('display','none');
                                    }
                                }});
                        }});

                }}});
    }

}