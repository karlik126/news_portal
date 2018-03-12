$(document).ready(function () {
    $('.nullLike').hover(function () {
        var news_id=$(this).attr('id');
        modal_id='#modal'+news_id;
        $(modal_id).show();
    });
    $('.nullLike').mouseleave(function () {
        var news_id=$(this).attr('id');
        modal_id='#modal'+news_id;
        $(modal_id).hide();
    });
    $( ".ActivLike,.noActivLike" ).click(function( event ) {
        event.preventDefault();
    });
});

function doit(news_id){
    var id='#id'+news_id;
    var clas=$(id).parent().attr('class');
    if(clas=='ActivLike'){
        removeLike(news_id);
    }else if(clas=='noActivLike'){
        putLike(news_id);
    }
}
function removeLike(news_id){
    $.ajax({
        type:'POST',
        url:'../../../like/removeLike',
        data: 'news_id='+news_id,
        success:function(msg) {
            updateCount(news_id);
            var id='#id'+news_id;
            $($(id).parent()).removeClass('ActivLike').addClass('noActivLike');
        }});
}
function putLike(news_id){
    $.ajax({
        type:'POST',
        url:'../../../like/putLike',
        data: 'news_id='+news_id,
        success:function(msg) {
            updateCount(news_id);
            var id='#id'+news_id;
            $($(id).parent()).removeClass('noActivLike').addClass('ActivLike');
        }});
}

function updateCount(news_id){
    $.ajax({
        type:'POST',
        url:'../../../like/updateCountLike',
        data: 'news_id='+news_id,
        success:function(count) {
            var id='#id'+news_id;
            $(id).text('Нравится  '+count);
        }});
}




