<?php include("../header_blog.php"); ?>
	<div class="container">
		<div class="blog-header">
        	<h1 class="blog-title">El Blog del GOEN</h1>
        	<p class="lead blog-description">El encuentro afortunado de todos</p>
      	</div>
        <div class="row">

          <div class="col-sm-8 col-md-offset-2 blog-main">
            <ul class="pager">
              <li class="previous"><a href="page_1.php" class="linkpager">&larr; </a></li>
              <li class="next disabled"><a href=""> &rarr;</a></li>
            </ul>
          		<?php

             /* cantidad de posts*/
              $posts = 5;
            /*post por paginas = 5*/
              $postspp = $posts - 5;

                for ($i=$posts; $i>$postspp; $i--) { 
                  include("../posts/post_".$i.".php"); 
                }
                  
                  
              ?>

            <ul class="pager">
              <li class="previous"><a href="page_1.php" class="linkpager">&larr; </a></li>
              <li class="next disabled"><a href=""> &rarr;</a></li>
            </ul>

        	</div>
    	</div>	
	</div>	
<?php include("../footer_blog.php"); ?>
</body>
</html>