<?php
return array(
    '^account$'=>'Account/index',
    '^offerProject$'=>'OfferProject/index',
    '^logout$'=>'Logout/index',
    '^autorization$'=>'Autorization/index',
    '^registration/success-registration$'=>'SuccessRegistration/index',
    '^registration$'=>'registration/index',
    '^news/view/([0-9]+)$'=>'news/view/$1',
    '^news/page/([0-9]+)$'=>'news/index/$1',
    '^news/PageNotFound$'=>'news/NotFound',

    '^registration/checkLogin$'=>'ajaxRegistration/Check_login',
    '^registration/checkMail$'=>'ajaxRegistration/Check_mail',

    '^like/removeLike$'=>'AjaxLike/RemoveLike',
    '^like/updateCountLike$'=>'AjaxLike/updateCount',
    '^like/putLike$'=>'AjaxLike/PutLike',

    '^coments/addComent$'=>'ajaxComents/PutComent',
    '^coments/deleteComent$'=>'ajaxComents/DeleteComent',
    '^coments/UpdateComents$'=>'ajaxComents/UpdateComents',
    '^coments/showMoreComents$'=>'ajaxComents/ShowMoreComents',
    '^coments/getComentsCount$'=>'ajaxComents/GetCountComents',


    '^NotFound404$'=>'notFound/index',
    '^$'=>'news/redirect'
);



?>