<hr>
<!--  Вьюха для вывода информации по всем записям (комментам или блогам)       -->
<div class="container">
    <h3 class="text-center">Список </h3>
    <br>

    <?php foreach ($data as $k => $v): ?>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $v['author']; ?></h3>
            </div>
            <div class="panel-body">
               <?php echo $v['text']; ?>...
            </div>
            
            <small><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>:<?php echo $v['date']; ?></small>
            <?php echo  (isset($v['kol']))? '<small><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>:'.$v['kol'].' </small> '
                    . '<a href=record.php?id='.$v['ref'].'>Перейти</a>':'' ;?>
                        
        </div>

    <?php endforeach; ?>

</div>
