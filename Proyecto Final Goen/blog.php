<?php include("header.php"); ?>
	<div class="container">
		<div class="blog-header">
        	<h1 class="blog-title">The Bootstrap Blog</h1>
        	<p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      	</div>

      	<div class="row">

        	<div class="col-sm-8 col-md-offset-2 blog-main">
          		<?php

             /* cantidad de posts*/
              $posts = 10;
            /*post por paginas = 5*/
              $postspp = $posts - 5;

                for ($i=$posts; $i>$postspp; $i--) { 
                  include("posts/post_".$i.".php"); 
                }
                
                  
              ?>
      <ul class="pager">
        <li class="previous disabled"><a href="#">&larr; Newer</a></li>
        <li class="next"><a href="blog_page_2.php">Older &rarr;</a></li>
      </ul>

        	</div>
    	</div>	
	</div>	
<?php include("footer.php"); ?>
</body>
</html>