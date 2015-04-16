<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sample</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            $f=fopen("stat.dat","a+");
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
          <h2>Отзывы пользователей</h2>
           <?
	       $array=file("text.txt");
	       $count=count($array);
	       echo "<article>";
	       for ($i=0; $i<$count; $i+=3)
		      echo "<h3>".$array[$i]."<span>".$array[$i+1]."</span></h3><p>".$array[$i+2]."</p>";
	       echo "</article>";
           ?>
       </section>
    </div>
</body>
</html>