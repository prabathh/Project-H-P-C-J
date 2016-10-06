<!DOCTYPE html>
<html>
  <?php include 'core/init.php';?>
  <?php include 'includes/head.php'; ?>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="content">

    <div class="front-wide">

      <?php
      if (logged_in() === true){
        include 'includes/widgets/loggedinw.php';
      }else {
        include 'includes/widgets/loginw.php';
      }
      ?>
      	<div class="featured-front">
      	
      	<div class="featured1">
      	<div id="count-container" class="positioning-text">
  			<p> <strong> <span class="no-bold">#1 in the World</span></strong><br />
  			<span class="no-bold">for graduate employability</span> </p>

			<div class="homepage-headline">
			<span class="yellow">ideas</span> that change<br /> the world</div>
		</div>  
		</div>
     </div>

     </div>

     </div>

    <?php include 'includes/footer.php'; ?>
  </body>
</html>
