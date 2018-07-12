<?php
require_once('header.php');
?>
<main class="bg1 noblur">

  <section id="page-1" class="page active">
    <div class="container">
      <div class="row">
        <div class="col-12 center">
          <h1>Welcome to SanTour</h1>
          <p class="thin-text">SanTour helps you find a hiking itinerary that's fit just for you</p>
          <button class="next-page">Let's begin</button>
        </div>
      </div>
    </div>
  </section>

  <form action="results.php" method="post">

    <section id="page-2" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Where do you want to go?</h1>
            <p class="thin-text">Choose the canton you want to hike in</p>
            <?php include 'map.php'; ?>
            <div class="col-12 center">
              <select id="canton-select" name="canton">
                <option value="CH" disabled>Whole Switzerland</option>
                <option value="AG" disabled>Aargau</option>
                <option value="AI" disabled>Appenzell Innerrhoden</option>
                <option value="AR" disabled>Appenzell Ausserrhoden</option>
                <option value="BE" disabled>Bern</option>
                <option value="BL" disabled>Basel-Landschaft</option>
                <option value="BS" disabled>Basel-Stadt</option>
                <option value="FR" disabled>Fribourg</option>
                <option value="GE" disabled>Geneva</option>
                <option value="GL" disabled>Glarus</option>
                <option value="GR" disabled>Grisons</option>
                <option value="JU" disabled>Jura</option>
                <option value="LU" disabled>Luzern</option>
                <option value="NE" disabled>Neuchâtel</option>
                <option value="NW" disabled>Nidwalden</option>
                <option value="OW" disabled>Obwalden</option>
                <option value="SG" disabled>St. Gallen</option>
                <option value="SH" disabled>Schaffhausen</option>
                <option value="SO" disabled>Solothurn</option>
                <option value="SZ" disabled>Schwyz</option>
                <option value="TG" disabled>Thurgau</option>
                <option value="TI" disabled>Ticino</option>
                <option value="UR" disabled>Uri</option>
                <option value="VD" disabled>Vaud</option>
                <option value="VS" selected>Valais</option>
                <option value="ZG" disabled>Zug</option>
                <option value="ZH" disabled>Zürich</option>
              </select>
            </div>
            <div class="col-12 center">
              <button type="button" class="next-page">select and continue</button>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section id="page-3" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you engaged in regular exercise?</h1>
            <p class="thin-text">such as walking, running, biking jogging etc.</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="physical-activity" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Maybe</span>
                    <input type="radio" name="physical-activity" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="physical-activity" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-4" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Would you say that you are active at least 30 minutes each day (at least 5 days a week)?</h1>
            <p class="thin-text">for example walking home from work or biking</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="physical-activity-2" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Maybe</span>
                    <input type="radio" name="physical-activity-2" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="physical-activity-2" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-5" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What walking devices do you use?</h1>
            <p class="thin-text">lorem ipsum</p>
            <div class="col-12">
              <div class="radio-buttons">
                <label>
                  Any
                  <input type="radio" name="walking-help" value="any" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  a cane
                  <input type="radio" name="walking-help" value="cane"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  two canes
                  <input type="radio" name="walking-help" value="twocanes" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  walker
                  <input type="radio" name="walking-help" value="walker" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-6" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Compared to the average walking speed,do you usually walk ...</h1>
            <p class="thin-text">for example when walking with a friend</p>
            <div class="col-12">
              <div class="radio-buttons">
                <label>
                  noticably slower
                  <input type="radio" name="walking-speed" value="-2" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  a bit slower
                  <input type="radio" name="walking-speed" value="-1" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  at the same speed
                  <input type="radio" name="walking-speed" value="0"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  a bit faster
                  <input type="radio" name="walking-speed" value="1" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  significantly faster
                  <input type="radio" name="walking-speed" value="2" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-7" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Choose the maximum time you think you can walk without stopping to rest</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="radio-buttons">
                <label>
                  impossible
                  <input type="radio" name="walking-speed" value="0" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  1 minute
                  <input type="radio" name="walking-speed" value="1" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  5 minutes
                  <input type="radio" name="walking-speed" value="2"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  15 minutes
                  <input type="radio" name="walking-speed" value="3" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  30 minutes
                  <input type="radio" name="walking-speed" value="4" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  1 hour
                  <input type="radio" name="walking-speed" value="5" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  2 hours
                  <input type="radio" name="walking-speed" value="6" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  3 hours or more
                  <input type="radio" name="walking-speed" value="7" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-8" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Report the degree of physical difficulty that best describes how difficult it was to climb stairs without stopping to rest during the last week</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="radio-buttons">
                <h5>Walking one story</h5>
                <label>
                  none
                  <input type="radio" name="incline" value="0" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  Light
                  <input type="radio" name="incline" value="1" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Some
                  <input type="radio" name="incline" value="2"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  significant
                  <input type="radio" name="incline" value="3" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  impossible
                  <input type="radio" name="incline" value="4" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-9" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you afraid of falling?</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="falling" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Not sure</span>
                    <input type="radio" name="falling" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="falling" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-10" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Have you fallen in the last 12 months?</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="falling2" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Not sure</span>
                    <input type="radio" name="falling2" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="falling2" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-11" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you sometimes feel dizzy?</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="falling3" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Not sure</span>
                    <input type="radio" name="falling3" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="falling3" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-12" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you afraid of altitude (fear of heights)?</h1>
            <p class="thin-text"></p>
            <div class="col-12">
              <div class="row">
                <div class="col-4">
                  <label class="thumb">
                    <span>Yes</span>
                    <input type="radio" name="fear-of-heights" value="yes" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>Not sure</span>
                    <input type="radio" name="fear-of-heights" value="maybe"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4">
                  <label class="thumb">
                    <span>No</span>
                    <input type="radio" name="fear-of-heights" value="no" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-13" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Which type of rocks would you prefer?</h1>
            <p class="thin-text">lorem ipsum</p>
            <div class="col-12">

              <div class="preview-slider">
                <div id="rocks" class="img-carousel">

                  <img id="img-1" class="selected" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-1.jpg" alt="">
                  <img id="img-2" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-2.jpg" alt="">
                  <img id="img-3" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-3.jpg" alt="">

                </div>
                <input type="range" min="1" max="3" value="1" class="slider">
                <span class="slide-tooltip">Slide me <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page">Select and continue</button>
            </div>
            <div class="col-12" style="color:black;">
              <a href="#">I want to skip this question</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <button type="submit">Submit form</button>
  </form>


</main>






<?php
require_once('footer.php');
?>
