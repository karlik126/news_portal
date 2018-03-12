<?php
class SuccessRegistrationController
{
    public function actionIndex(){
        if(isset($_SERVER['HTTP_REFERER'])){
            if($_SERVER['HTTP_REFERER']!="http://qwe/registration") {
                header("Location:../registration");
            }
            else{
                echo "<div style='position: absolute;left:25%;top:40%;'><h3>Регистрация прошла успешно!
              На ваш эмейл было выслано сообщение с подтверждением для аккаунт.<a href='../../../'>На главную.</a></h3></div>";
            }
            return true;
        }else{
            header("Location:../registration");
            return true;
        }

    }


}