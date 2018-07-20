<?php
require_once('header.php');
?>
<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 9999999999999999999999; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: rgba(255,255,255,.9);
    border-radius: 5px;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<main class="bg4">
  <section class="page active">
    <div class="container" style="padding-top: 4.5em;">
      <div class="row">

        <div class="col-12">
          <input class="name-box" style="width:100%" type="text" placeholder="POD name..." name="" value="">
        </div>
        <div class="col-12 center">
          <img style="width:100%;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Visible_roots.jpg/220px-Visible_roots.jpg" alt="">
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

              <button type="button" name="button" id="myBtn" style="width:100%;">Add difficulties</button>
              <button type="button" name="button" style="width:47%;">Cancel</button>
              <button type="button" name="button" style="width:47%;">Save</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="center">
      <h2>Set difficulties:</h2>
      <select id="canton-select" name="canton" style="width:100%;">
          <option value="roots">Rocks</option>

      </select>

                    <div class="preview-slider">
                      <div id="rocks" class="img-carousel count-5">
                        <br>

                        <img value="0"  class="img-0-rocks selected" src="<?php echo URL_DIR ?>../assets/img/form/rocks/rocks-0.jpg" alt="">
                        <img value="25" class="img-25-rocks" src="<?php echo URL_DIR ?>../assets/img/form/rocks/rocks-1.jpg" alt="">
                        <img value="50" class="img-50-rocks" src="<?php echo URL_DIR ?>../assets/img/form/rocks/rocks-2.jpg" alt="">
                        <img value="75" class="img-75-rocks" src="<?php echo URL_DIR ?>../assets/img/form/rocks/rocks-3.jpg" alt="">
                        <img value="100" class="img-100-rocks" src="<?php echo URL_DIR ?>../assets/img/form/rocks/rocks-4.jpg" alt="">

                        <span class="img-0-rocks selected">No rocks</span>
                        <span class="img-25-rocks">Minor rocks</span>
                        <span class="img-50-rocks">Mediocre sized rocks</span>
                        <span class="img-75-rocks">Large rocks</span>
                        <span class="img-100-rocks">Extremely large rocks</span>
                        <style media="screen">
                          span{
                              font-family: 'Roboto-Medium', sans-serif;
                              font-size: 16px;
                          }
                        </style>

                      </div>
                      <input type="range" min="0" max="100" value="0" step="25" value="0" class="slider" name="rocks">
                      <span class="slide-tooltip">Slide me <i class="arrow_triangle-up"></i></span>
                      <br>
                      <button type="button" name="button" style="width:47%;">Cancel</button>
                      <button type="button" name="button" style="width:47%;">Save</button>
                    </div>
    </div>

</div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





<?php
require_once('footer.php');
?>
