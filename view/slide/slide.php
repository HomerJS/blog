<?php
require_once 'controller/absractText.php';
require_once 'controller/Blog.php';
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>



    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach (blog\Blog::getTop($conn) as $k=>$v): ?>

            <div class="<?php echo $k==0?'item active':'item'; ?>">
                <img src="icon/back_gr.jpg" alt="blog">
                <div class="carousel-caption">
                    <h3><?php echo '<a href=record.php?id='.$v['ref'].'>'.$v['author'].'</a>'; ?></h3>
                    <p><?php echo $v['text']; ?></p>
                </div>
            </div>

        <?php endforeach; ?>

        
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
