<?php
require_once('header.php');
?>
<main>

  <section id="page-1" class="page bg1 active">
    <div class="container">
      <div class="row">
        <div class="col-12 center">
          <h1>Welcome to SanTour</h1>
          <p class="thin-text">SanTour helps you find a hiking itinerary that's fit just for you</p>
          <button id="start-button">Let's begin</button>
        </div>
      </div>
    </div>
  </section>

  <section id="page-2" class="page bg2">
    <div class="container">
      <div class="row">
        <div class="col-12 center">
          <h1>Where do you want to go?</h1>
          <p class="thin-text">Choose the canton you want to hike in</p>
          <?php include 'map.php'; ?>
          <button>select and continue</button>
        </div>
      </div>
    </div>
  </section>

</main>






<?php
require_once('footer.php');
?>
