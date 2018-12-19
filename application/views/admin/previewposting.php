<div class="parallax-container">
                <div class="parallax"><img src="https://images.pexels.com/photos/735911/pexels-photo-735911.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"></div>
            </div>
            
<div class="container">
    <div class="section">
        <div class="row">
     <?php   foreach ($posting as $post)
    { ?>
    <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="https://images.pexels.com/photos/938965/pexels-photo-938965.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
          <span class="card-title"><?=$post->title?></span>
        </div>
        <div class="card-content">
          <p><?=$post->content?></p>
        </div>
        <div class="card-action">
          <a href="#">Location</a>
        </div>
      </div>
    </div>
  </div>
    <?php } ?>


            


        </div>
    </div>
</div>