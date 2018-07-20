<?php
require_once('header.php');
?>
<main class="bg4">
  <section class="page active">
    <div class="container" style="padding-top: 4.5em;">
      <div class="row">

        <div class="col-12">
          <input class="name-box" style="width:100%" type="text" placeholder="POI name..." name="" value="">
        </div>
        <div class="col-12 center">
          <img style="width:100%;" src="https://images.unsplash.com/photo-1486578077620-8a022ddd481f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=85550af4293fee2c13a9754e45eb8a52&w=1000&q=80" alt="">
          <button type="button" name="button" style="width:47%;"><i class="icon_camera_alt"></i> Take</button>
          <button type="button" name="button" style="width:47%;">Choose <i class="icon_image"></i></button>
        </div>
        <div class="white-container" style="float:left;">
          <div class="row">
            <div class="col-12">
              <h2 style="text-align:center; margin-top:0;">Cordinates</h2>
              <p class="left" style="margin:0;">Latitude: 1.24342</span> <p class="right" style="margin:0;">Longitude: 2.1234</span>
            </div>
            <div class="col-12">
              <h2 style="text-align:center; margin-top:0;">Description</h2>
              <input class="name-box" style="width:100%" type="text" placeholder="Write here..." name="" value="">

              <button type="button" name="button" style="width:47%;">Cancel</button>
              <button type="button" name="button" style="width:47%;">Save</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>




<?php
require_once('footer.php');
?>
