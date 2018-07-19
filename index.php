<?php
require_once('header.php');
?>
<main class="bg1 noblur">

  <section id="page-1" class="page active">
    <div class="container">
      <div class="row">
        <div class="col-12 center">
          <h1><?php echo $lang['INDEX_WELCOME'] ?></h1>
          <p class="thin-text"><?php echo $lang['INDEX_INTRO'] ?></p>
          <button class="next-page"><?php echo $lang['INDEX_BEGIN'] ?></button>
        </div>
      </div>
    </div>
  </section>
  <?php $cookie_name = "saved-users"; ?>
  <?php if (isset($_COOKIE[$cookie_name])): ?>
    <?php $saved_users = unserialize($_COOKIE[$cookie_name]); ?>
    <?php foreach ($saved_users as $key => $user): ?>
          <?php $name = $user['username'];?>
          <?php $user['username'] = ""; ?>
          <?php $user['canton'] = ""; ?>
          <form class="cookie-form" hidden id="user-<?php echo $key ?>" action="results.php" method="post">
            <?php foreach ($user as $key => $user_info): ?>
              <input hidden type="text" name="<?php echo $key ?>" value="<?php echo $user_info ?>">
            <?php endforeach; ?>
          </form>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if (isset($_COOKIE["user-1"])): ?>
    <?php $user = unserialize($_COOKIE["user-1"]) ?>
        <?php $user['username'] = ""; ?>
        <?php $user['canton'] = ""; ?>
        <form class="cookie-form" hidden id="user-1" action="results.php" method="post">
          <?php foreach ($user as $key => $user_info): ?>
            <input hidden type="text" name="<?php echo $key ?>" value="<?php echo $user_info ?>">
          <?php endforeach; ?>
        </form>
  <?php endif; ?>


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
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-3" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What's your name?</h1>
            <p class="thin-text">By giving your name we can save your information to your browser so you can easily access it later</p>
            <div class="col-12">
              <input placeholder="Write here..." class="name-box" type="text" name="username" maxlength="20" value="">
            </div>
            <div class="col-12">
              <button type="button" id="physical-1" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>

            <div class="col-12">
              <div class="col-12">
                <?php if (isset($_COOKIE[$cookie_name])): ?>
                  <h4>Previous saved users:</h4>
                <?php endif; ?>
              </div>
              <div class="row">
                <?php if (isset($_COOKIE[$cookie_name])): ?>
                  <?php $saved_users = unserialize($_COOKIE[$cookie_name]); ?>
                  <?php foreach ($saved_users as $key => $user): ?>
                    <div class="col-3 user-box" value="<?php echo $key ?>">
                      <i class="icon_close" value="<?php echo $key ?>"></i>
                      <div class="initials">
                        <?php
                        $name = $user['username'];
                        $initials = "";

                        foreach (explode(" ", $name) as $w) {
                          if (strlen($w) > 1) {
                            $initials .= $w[0];
                          }else {
                            $initials .= $w;
                          }

                        }
                         ?>
                        <span><?php echo $initials; ?></span>
                      </div>
                        <span><?php echo $name ?></span>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-4" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you engaged in regular exercise?</h1>
            <p class="thin-text">such as walking, running, biking jogging etc.</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['Yes'] ?></span>
                    <input class="physical-1" type="radio" name="physical-activity" value="67" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NOT_SURE'] ?></span>
                    <input class="physical-1" type="radio" name="physical-activity" value="67"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NO'] ?></span>
                    <input class="physical-1" type="radio" name="physical-activity" value="0" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" id="pageskipperone" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-5" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you active at least 30 minutes each day?</h1>
            <p class="thin-text">(at least 5 days a week)</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['Yes'] ?></span>
                    <input class="physical-2" type="radio" name="physical-activity" value="83" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NOT_SURE'] ?></span>
                    <input class="physical-2" type="radio" name="physical-activity" value="67"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NO'] ?></span>
                    <input class="physical-2" type="radio" name="physical-activity" value="67" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" id="pageskippertwo" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-6" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you sweat or be out of breath during this activity?</h1>
            <p class="thin-text">occasionally or regularly</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['Yes'] ?></span>
                    <input type="radio" name="physical-activity" value="100" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NOT_SURE'] ?></span>
                    <input type="radio" name="physical-activity" value="83"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NO'] ?></span>
                    <input type="radio" name="physical-activity" value="83" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-7" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you require any walking device?</h1>
            <p class="thin-text">Select a device you can't hike without</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <label>
                  a cane
                  <input type="radio" name="walking-help" value="80"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  two canes
                  <input type="radio" name="walking-help" value="60" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  walker
                  <input type="radio" name="walking-help" value="40" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  a walking frame
                  <input type="radio" name="walking-help" value="20" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  I need help of a third party
                  <input type="radio" name="walking-help" value="0" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  None
                  <input type="radio" name="walking-help" value="100" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-8" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Compared to the average walking speed,do you usually walk ...</h1>
            <p class="thin-text">for example when walking with a friend</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <label>
                  Noticeably slower
                  <input type="radio" name="walking-speed" value="20" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  A bit slower
                  <input type="radio" name="walking-speed" value="40" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  At the same speed
                  <input type="radio" name="walking-speed" value="60"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  A bit faster
                  <input type="radio" name="walking-speed" value="80" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Significantly faster
                  <input type="radio" name="walking-speed" value="100" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-9" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>How long can you walk without stopping to rest?</h1>
            <p class="thin-text">Choose the best suiting option</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <label>
                  impossible
                  <input type="radio" name="walking-time" value="0" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  1 minute
                  <input type="radio" name="walking-time" value="14" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  5 minutes
                  <input type="radio" name="walking-time" value="29"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  15 minutes
                  <input type="radio" name="walking-time" value="43" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  30 minutes
                  <input type="radio" name="walking-time" value="57" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  1 hour
                  <input type="radio" name="walking-time" value="71" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  2 hours
                  <input type="radio" name="walking-time" value="86" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  3 hours or more
                  <input type="radio" name="walking-time" value="100" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-10" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>How many floors of stairs would you be able to climb without taking a break?</h1>
            <p class="thin-text">Which option describes your physical ability the best?</p>
            <div class="col-12">
              <div id="mount-slider" class="white-container">
                <img class="mount mount-0" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-0.png" alt="Not at all">
                <img hidden class="mount mount-10" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-10.png" alt="Not at all">
                <img hidden class="mount mount-20" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-20.png" alt="Not at all">
                <img hidden class="mount mount-30" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-30.png" alt="Not at all">
                <img hidden class="mount mount-40" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-40.png" alt="Not at all">
                <img hidden class="mount mount-50" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-50.png" alt="Not at all">
                <img hidden class="mount mount-60" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-60.png" alt="Not at all">
                <img hidden class="mount mount-70" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-70.png" alt="Not at all">
                <img hidden class="mount mount-80" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-80.png" alt="Not at all">
                <img hidden class="mount mount-90" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-90.png" alt="Not at all">
                <img hidden class="mount mount-100" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-100.png" alt="Not at all">
                <?php // TODO: add correct alt texts ?>
                <br>
                <span class="mount mount-0">I'm unable to climb stairs</span>
                <span hidden class="mount mount-10">I'm unable to climb 1 floor of stairs without a break</span>
                <span hidden class="mount mount-20">I might be able to climb 1 floor of stairs without a break</span>
                <span hidden class="mount mount-30">I'm able to climb at maximum 1 floor of stairs without a break</span>
                <span hidden class="mount mount-40">I'm unable to climb 3 floors of stairs without a break</span>
                <span hidden class="mount mount-50">I might be able to climb 3 floors of stairs without a break</span>
                <span hidden class="mount mount-60">I'm able to climb at maximum 3 floors of stairs without a break</span>
                <span hidden class="mount mount-70">I'm unable to climb 5 floors of stairs without a break</span>
                <span hidden class="mount mount-80">I might be able to climb 5 floors of stairs without a break</span>
                <span hidden class="mount mount-90">I'm at maximum able to climb 5 floors of stairs without a break</span>
                <span hidden class="mount mount-100">I'm able to climb over 5 floors of stairs without a break</span>

                <input type="range" min="0" max="100" step="10" value="0" class="slider" name="mounting">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-11" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Rate your self-confidence to walk</h1>
            <p class="thin-text">Please choose the options that best describe you</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <p>Are you afraid of falling?</p>
                <label>
                  Yes
                  <input type="radio" name="walking-confidence-1" value="0" />
                  <span class="checkmark"></span>
                </label>
                <label>
                  No
                  <input type="radio" name="walking-confidence-1" value="20" />
                  <span class="checkmark"></span>
                </label>

                <p>Have you fallen in the last 12 months?</p>
                <label>
                  No
                  <input type="radio" name="walking-confidence-2" value="60"/>
                  <span class="checkmark"></span>
                </label>

                <label>
                  Once
                  <input type="radio" name="walking-confidence-2" value="40" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Twice
                  <input type="radio" name="walking-confidence-2" value="20" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Several times
                  <input type="radio" name="walking-confidence-2" value="0" />
                  <span class="checkmark"></span>
                </label>

                <p>Do you feel dizzy sometimes?</p>
                <label>
                  Yes
                  <input type="radio" name="walking-confidence-3" value="0" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  No
                  <input type="radio" name="walking-confidence-3" value="20" />
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="page-12" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Are you afraid of heights?</h1>
            <p class="thin-text">Do you feel fear when looking down from high altitutes?</p>
            <div class="col-12">
              <div class="row">
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['Yes'] ?></span>
                    <input type="radio" name="fear-of-heights" value="0" />
                    <img src="<?php echo URL_DIR ?>/assets/img/yes.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NOT_SURE'] ?></span>
                    <input type="radio" name="fear-of-heights" value="50"/>
                    <img src="<?php echo URL_DIR ?>/assets/img/maybe.svg">
                  </label>
                </div>
                <div class="col-4 thumb-container">
                  <label class="thumb">
                    <span><?php echo $lang['NO'] ?></span>
                    <input type="radio" name="fear-of-heights" value="100" />
                    <img src="<?php echo URL_DIR ?>/assets/img/no.svg">
                  </label>
                </div>

              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-13" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you feel safe when you stand on one leg?</h1>
            <p class="thin-text">Without holding or leaning onto something</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <label>
                  Yes, I feel sure
                  <input type="radio" name="balance" value="100" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  No, I don't feel sure
                  <input type="radio" name="balance" value="50" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Impossible without holding
                  <input type="radio" name="balance" value="0"/>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-14" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you feel any of the following pains?</h1>
            <p class="thin-text">Tick a box if you feel the type of pain</p>
            <div class="col-12">
              <div class="checkboxes white-container">
                <label>
                  Hip pain
                  <input type="checkbox" class="pain" name="pain-1" value="25">
                  <span class="checkmark"></span>
                </label>
                <label>
                  Knee pain
                  <input type="checkbox" class="pain" name="pain-2" value="25">
                  <span class="checkmark"></span>
                </label>
                <label>
                  Foot pain
                  <input type="checkbox" class="pain" name="pain-3" value="25">
                  <span class="checkmark"></span>
                </label>
                <label>
                  Back pain
                  <input type="checkbox" class="pain" name="pain-4" value="25">
                  <span class="checkmark"></span>
                </label>
                <label>
                  No pain
                  <input type="checkbox" class="no-pain" name="pain" value="100">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-15" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Do you have mobility problems in the following joints?</h1>
            <p class="thin-text">Choose one or more</p>
            <div class="col-12">
              <div class="checkboxes white-container">
                <label>
                  Reduced mobility in the ankles
                  <input type="checkbox" name="mobility-1" class="no-mobility" value="33">
                  <span class="checkmark"></span>
                </label>
                <label>
                  Reduced mobility on your knees
                  <input type="checkbox" name="mobility-2" class="no-mobility" value="34">
                  <span class="checkmark"></span>
                </label>
                <label>
                  Reduced mobility in your hip
                  <input type="checkbox" name="mobility-3" class="no-mobility" value="33">
                  <span class="checkmark"></span>
                </label>
                <label>
                  No mobility problems
                  <input type="checkbox" name="mobility" class="full-mobility" value="100">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-16" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Which level of roots would you prefer?</h1>
            <p class="thin-text">What is the maximum density of roots you'd prefer on your hiking itinerary?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="roots" class="img-carousel count-5">

                  <img  value="0" class="img-0-roots selected" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-0.jpg" alt="">
                  <img  value="25" class="img-25-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-1.jpg" alt="">
                  <img value="50" class="img-50-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-2.jpg" alt="">
                  <img value="75" class="img-75-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-3.jpg" alt="">
                  <img value="100" class="img-100-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-4.jpg" alt="">

                  <span class="img-0-roots selected">No roots</span>
                  <span class="img-25-roots">Few roots</span>
                  <span class="img-50-roots">Moderate amount of roots</span>
                  <span class="img-75-roots">Many roots</span>
                  <span class="img-100-roots">Extreme amount of roots</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="roots">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-17" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Which level of rocks would you prefer?</h1>
            <p class="thin-text">What is the largest rock you'd be able to face in an itinerary?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="rocks" class="img-carousel count-5">

                  <img value="0"  class="img-0-rocks selected" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-0.jpg" alt="">
                  <img value="25" class="img-25-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-1.jpg" alt="">
                  <img value="50" class="img-50-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-2.jpg" alt="">
                  <img value="75" class="img-75-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-3.jpg" alt="">
                  <img value="100" class="img-100-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-4.jpg" alt="">

                  <span class="img-0-rocks selected">No rocks</span>
                  <span class="img-25-rocks">Minor rocks</span>
                  <span class="img-50-rocks">Mediocre sized rocks</span>
                  <span class="img-75-rocks">Large rocks</span>
                  <span class="img-100-rocks">Extremely large rocks</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" value="0" class="slider" name="rocks">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-18" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>Choose the level of bumpiness</h1>
            <p class="thin-text">What is your preference in the bumpiness of the itinerary?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="bumps" class="img-carousel count-5">

                  <img value="0"  class="img-0-bumps selected" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-0.jpg" alt="">
                  <img value="1" class="img-25-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-1.jpg" alt="">
                  <img value="2" class="img-50-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-2.jpg" alt="">
                  <img value="3" class="img-75-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-3.jpg" alt="">
                  <img value="4" class="img-100-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-4.jpg" alt="">

                  <span class="img-0-bumps selected">No bumps</span>
                  <span class="img-25-bumps">Minor bumps</span>
                  <span class="img-50-bumps">Mediocre sized of bumps</span>
                  <span class="img-75-bumps">Large bumps</span>
                  <span class="img-100-bumps">Extremely large bumps</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" value="0" class="slider" name="bumps">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-19" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What level of climbing would you like?</h1>
            <p class="thin-text">Which option describes your preference in climbing?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="climbing" class="img-carousel count-5">

                  <img value="0"  class="img-0-climbing selected" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-0.jpg" alt="">
                  <img value="25" class="img-25-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-1.jpg" alt="">
                  <img value="50" class="img-50-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-2.jpg" alt="">
                  <img value="75" class="img-75-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-3.jpg" alt="">
                  <img value="100" class="img-100-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-4.jpg" alt="">

                  <span class="img-0-climbing selected">No climbing</span>
                  <span class="img-25-climbing">Easy rock climbing</span>
                  <span class="img-50-climbing">Moderate rock climbing</span>
                  <span class="img-75-climbing">Challenging rock climbing</span>
                  <span class="img-100-climbing">Wall climbing</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" value="0" class="slider" name="climbing">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-20" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What level of descending would you like?</h1>
            <p class="thin-text">Which option describes your preference in the level of ground decent?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="decent" class="img-carousel count-5">

                  <img value="0"  class="img-0-decent selected" src="<?php echo URL_DIR ?>assets/img/form/decent/decent-0.jpg" alt="">
                  <img value="25" class="img-25-decent" src="<?php echo URL_DIR ?>assets/img/form/decent/decent-1.jpg" alt="">
                  <img value="50" class="img-50-decent" src="<?php echo URL_DIR ?>assets/img/form/decent/decent-2.jpg" alt="">
                  <img value="75" class="img-75-decent" src="<?php echo URL_DIR ?>assets/img/form/decent/decent-3.jpg" alt="">
                  <img value="100" class="img-100-decent" src="<?php echo URL_DIR ?>assets/img/form/decent/decent-4.jpg" alt="">

                  <span class="img-0-decent selected">No decent</span>
                  <span class="img-25-decent">Easy decent</span>
                  <span class="img-50-decent">Moderate decent</span>
                  <span class="img-75-decent">Challenging decent</span>
                  <span class="img-100-decent">Extreme decent</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" value="0" class="slider" name="decent">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-21" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What level of ground flatness would you like?</h1>
            <p class="thin-text">Which option describes your preference in the level of ground flatness?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="flatness" class="img-carousel count-5">

                  <img value="0" class="img-0-flatness selected" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-0.jpg" alt="">
                  <img value="25" class="img-25-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-1.jpg" alt="">
                  <img value="50" class="img-50-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-2.jpg" alt="">
                  <img value="75" class="img-75-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-3.jpg" alt="">
                  <img value="100" class="img-100-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-4.jpg" alt="">

                  <span class="img-0-flatness selected">Flat land</span>
                  <span class="img-25-flatness">Easy hills</span>
                  <span class="img-50-flatness">Moderate hills</span>
                  <span class="img-75-flatness">Challenging hills</span>
                  <span class="img-100-flatness">Extreme hills</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="flatness">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-22" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What kind of bridges would you prefer?</h1>
            <p class="thin-text">Which option describes your preference in the type of bridges?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="bridges" class="img-carousel count-5">

                  <img value="0" class="img-0-bridges selected" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-0.jpg" alt="">
                  <img value="25" class="img-25-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-1.jpg" alt="">
                  <img value="50" class="img-50-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-2.jpg" alt="">
                  <img value="75" class="img-75-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-3.jpg" alt="">
                  <img value="100" class="img-100-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-4.jpg" alt="">

                  <span class="img-0-bridges selected">No bridges</span>
                  <span class="img-25-bridges">Very shallow bridges</span>
                  <span class="img-50-bridges">Moderately high bridges</span>
                  <span class="img-75-bridges">High bridges</span>
                  <span class="img-100-bridges">Very high bridges</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="bridges">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-23" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What kind of ridges would you prefer?</h1>
            <p class="thin-text">Which option describes your preference in the type of ridges?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="ridges" class="img-carousel count-5">

                  <img value="0" class="img-0-ridges selected" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-0.jpg" alt="">
                  <img value="25" class="img-25-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-1.jpg" alt="">
                  <img value="50" class="img-50-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-2.jpg" alt="">
                  <img value="75" class="img-75-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-3.jpg" alt="">
                  <img value="100" class="img-100-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-4.jpg" alt="">

                  <span class="img-0-ridges selected">No ridges</span>
                  <span class="img-25-ridges">Very small ridges</span>
                  <span class="img-50-ridges">Moderately large ridges</span>
                  <span class="img-75-ridges">Large ridges</span>
                  <span class="img-100-ridges">Extremely large ridges</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="ridges">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-24" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>How narrow would you prefer the itinerary to be?</h1>
            <p class="thin-text">Which option describes your preference in the width of the path?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="path-narrowness" class="img-carousel count-5">

                  <img value="0" class="img-0-path-narrowness selected" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-0.jpg" alt="">
                  <img value="25" class="img-25-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-1.jpg" alt="">
                  <img value="50" class="img-50-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-2.jpg" alt="">
                  <img value="75" class="img-75-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-3.jpg" alt="">
                  <img value="100" class="img-100-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-4.jpg" alt="">

                  <span class="img-0-path-narrowness selected">Very wide path</span>
                  <span class="img-25-path-narrowness">Wide path</span>
                  <span class="img-50-path-narrowness">Moderately wide path</span>
                  <span class="img-75-path-narrowness">Narrow path</span>
                  <span class="img-100-path-narrowness">Extremely narrow path</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="path-narrowness">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-25" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>What kind of handrails would you prefer?</h1>
            <p class="thin-text">Which option describes your preference in the type of handrails?</p>
            <div class="col-12">

              <div class="preview-slider white-container">
                <div id="handrails" class="img-carousel count-5">


                  <img value="0" class="img-0-handrails selected" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-4.jpg" alt="">
                  <img value="25" class="img-25-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-3.jpg" alt="">
                  <img value="50" class="img-50-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-2.jpg" alt="">
                  <img value="75" class="img-75-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-1.jpg" alt="">
                  <img value="100" class="img-100-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-0.jpg" alt="">

                  <span class="img-100-handrails">No handrails</span>
                  <span class="img-75-handrails">Very simple handrails</span>
                  <span class="img-50-handrails">Safety chains for handrails</span>
                  <span class="img-25-handrails">Waist high handrails</span>
                  <span class="img-0-handrails selected">Full height handrails</span>

                </div>
                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="handrails">
                <span class="slide-tooltip"> <?php echo $lang['SLIDE_ME']?> <i class="arrow_triangle-up"></i></span>
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="page-26" class="page">
      <div class="container">
        <div class="row">
          <div class="col-12 center">
            <h1>How long do you wish to hike?</h1>
            <p class="thin-text">Which option best describes the time you'd want to spend on hiking?</p>
            <div class="col-12">
              <div class="radio-buttons white-container">
                <label>
                  0-2 hours
                  <input type="radio" name="time" value="0" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  2-4 hours
                  <input type="radio" name="time" value="50" />
                  <span class="checkmark"></span>
                </label>

                <label>
                  Over 5 hours
                  <input type="radio" name="time" value="100"/>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="next-page"><?php echo $lang['CONTINUE'] ?></button>
              <a class="left previous-page"><?php echo $lang['BACK'] ?></a>
              <span class="right done-text"><span class="done-percentage"></span>% <?php echo $lang['DONE'] ?></span>
            </div>
            <div class="col-12">
              <a class="skip"><?php echo $lang['SKIP'] ?></a>
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
