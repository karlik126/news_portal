function showMoreComents(news_id){
     var otherComents=$('.otherComents').val();
    var nowCount=$('.nowCount').val();
    $.ajax({
        type:'POST',
        url:'../../../coments/showMoreComents',
        dataType:'json',
        data: {
            'news_id':news_id,
            'otherComents':otherComents,
            'nowCount':nowCount
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
            var newCommonComents= parseInt(otherComents)+parseInt(nowCount);
            $('.nowCount').val(newCommonComents);
            $.ajax({
                type:'POST',
                url:'../../../coments/getComentsCount',
                data: {
                    'news_id':news_id},
                success:function (count) {
                    var different=count-newCommonComents;
                    if( different<10){
                        var result=different;
                    }else{
                        var result=10;
                    }
                    $('.otherComents').val(result);
                    $('.moreComents a').text("Показать предыдущие "+result+" комментария");

                    if($('.nowCount').val()==count ){
                        $('.moreComents ').css('display','none');
                    }
                    if($('.otherComents').val()==0 && count>4){
                        $('.hideComents').css('display','block');

                    }



                }

            });



        }});

}
function hideComents(news_id){
    $('.nowCount').val(4);
    $.ajax({
        type:'POST',
        url:'../../../coments/UpdateComents',
        dataType:'json',
        data: {
            'news_id':news_id,
            'limit': $('.nowCount').val()
        },
        success:function(msg) {
            $('.coment').remove();
            $('.hideComents').css('display','none');
            $('.moreComents ').css('display','block');
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
                    'news_id':news_id
                },
                success:function (count) {
                    var different=count-4;
                    if( different<10){
                        var result=different;
                    }else{
                        var result=10;
                    }
                    $('.otherComents').val(result);
                    if(result>0){
                        $('.moreComents a').text("Показать предыдущие "+result+" комментария");
                    }else{
                        $('.moreComents').css('display','none');
                    }




                }

            });
            }})}

