<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sample</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?
    $f=fopen("text.txt","a") or die("Ошибка! Невозможно открыть файл text.txt");
    flock ($f,LOCK_EX);
    {
	   $t1=$_GET['subject'];
	   $t2=$_GET['name'];
	   $t3=$_GET['area'];
	   fputs($f,"\r".$t1."\r\n");
	   fputs($f,$t2."\r\n");
	   fputs($f,$t3."\r\n");
    }
    flock ($f,LOCK_UN);
    fclose($f);
    ?>
   <div class="background"></div>
    <div class="content">
       <h1>Yet another blog</h1>
       <section class="left">
           <nav>
               <ul>
                   <li><a href="index.php">Отзывы</a></li>
                   <li><a href="add.php">Добавить</a></li>
                   <li><a href="">Раздел три</a></li>
                   <li><a href="">Раздел четыре</a></li>
               </ul>
           </nav>
           <?php
            $f=fopen("stat_twoo.dat","a+");
            flock($f,LOCK_EX);
            $count=fread($f,100);
            @$count++;
            ftruncate($f,0);
            fwrite($f,$count);
            fflush($f);
            flock($f,LOCK_UN);
            fclose($f);

            echo '<p class="view">Количество просмотров: '.$count.'</p>'; 
            ?>
       </section>
       <section class="right">
            <h2>Написать отзыв</h2>
            <form action="<?=$SCRIPT_NAME?>" method="get">
                <input type="text" name="subject" placeholder="Тема сообщения">
                <input type="text" name="name" placeholder="Имя">
                <textarea name="area" id=""></textarea>
                <input type="submit" value="отправить">
            </form>
       </section>
    </div>
</body>
</html>