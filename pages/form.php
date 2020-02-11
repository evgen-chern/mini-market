<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Через секунду перенаправление бла бла бла....</p>
    <?php if(!empty($_SESSION['pay'])): ?>
    <form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
        <input type="hidden" name="ik_co_id" value="5e42ed071ae1bd1e008b456a" />
        <input type="hidden" name="ik_pm_no" value="<?=$_SESSION['pay'] ['id'];?>" />
        <input type="hidden" name="ik_am" value="<?=$_SESSION['pay'] ['price'];?>" />
        <input type="hidden" name="ik_cur" value="RUB" />
        <input type="hidden" name="ik_desc" value="Сумма" />
        <input type="submit" value="Оплатить">
    </form>
<?php endif;?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>
        setTimeout(function(){
            $('form').submit();
        },3000);
    </script>
</body>
</html>