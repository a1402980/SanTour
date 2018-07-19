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
                        <h1><?php echo $lang['PAGE_MAP_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_MAP_SUBTITLE']; ?></p>
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
                        <script type="text/javascript">
                        $(".map-canton").click(function(){
                          if ($(this).attr('id') == "VS") {
                            $("#canton-select").val($(this).attr('id'));
                            $("#map .map-canton").removeClass("selected");
                            $(this).addClass("selected")
                          }else {
                            alert("<?php echo $lang['PAGE_MAP_ALERT']; ?>");
                          }

                        });
                        </script>
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
                        <h1><?php echo $lang['PAGE_NAME_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_NAME_SUBTITLE']; ?></p>
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
                                    <h4><?php echo $lang['PAGE_NAME_USERS_TITLE']; ?></h4>
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
                        <h1><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_1_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_1_SUBTITLE']; ?></p>
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
                        <h1><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_2_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_2_SUBTITLE']; ?></p>
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
                        <h1><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_3_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_PHYSICAL_ACTIVITY_3_SUBTITLE']; ?></p>
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
                        <h1><?php echo $lang['PAGE_WALKING_HELP_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_WALKING_HELP_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_1']; ?>
                                    <input type="radio" name="walking-help" value="80"/>
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_2']; ?>
                                    <input type="radio" name="walking-help" value="60" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_3']; ?>
                                    <input type="radio" name="walking-help" value="40" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_4']; ?>
                                    <input type="radio" name="walking-help" value="20" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_5']; ?>
                                    <input type="radio" name="walking-help" value="0" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_HELP_OPTION_6']; ?>
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
                        <h1><?php echo $lang['PAGE_WALKING_SPEED_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_WALKING_SPEED_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <label>
                                    <?php echo $lang['PAGE_WALKING_SPEED_OPTION_1']; ?>
                                    <input type="radio" name="walking-speed" value="20" />
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_WALKING_SPEED_OPTION_2']; ?>
                                    <input type="radio" name="walking-speed" value="40" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_SPEED_OPTION_3']; ?>
                                    <input type="radio" name="walking-speed" value="60"/>
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_SPEED_OPTION_4']; ?>
                                    <input type="radio" name="walking-speed" value="80" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_SPEED_OPTION_5']; ?>
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
                        <h1><?php echo $lang['PAGE_WALKING_TIME_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_WALKING_TIME_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_1']; ?>
                                    <input type="radio" name="walking-time" value="0" />
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_2']; ?>
                                    <input type="radio" name="walking-time" value="14" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_3']; ?>
                                    <input type="radio" name="walking-time" value="29"/>
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_4']; ?>
                                    <input type="radio" name="walking-time" value="43" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_5']; ?>
                                    <input type="radio" name="walking-time" value="57" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_6']; ?>
                                    <input type="radio" name="walking-time" value="71" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_7']; ?>
                                    <input type="radio" name="walking-time" value="86" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_TIME_OPTION_8']; ?>
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
                        <h1><?php echo $lang['PAGE_MOUNTING_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_MOUNTING_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div id="mount-slider" class="white-container">
                                <img class="mount mount-0" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-0.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_1']; ?>">
                                <img hidden class="mount mount-10" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-10.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_2']; ?>">
                                <img hidden class="mount mount-20" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-20.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_3']; ?>">
                                <img hidden class="mount mount-30" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-30.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_4']; ?>">
                                <img hidden class="mount mount-40" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-40.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_5']; ?>">
                                <img hidden class="mount mount-50" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-50.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_6']; ?>">
                                <img hidden class="mount mount-60" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-60.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_7']; ?>">
                                <img hidden class="mount mount-70" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-70.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_8']; ?>">
                                <img hidden class="mount mount-80" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-80.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_9']; ?>">
                                <img hidden class="mount mount-90" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-90.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_10']; ?>">
                                <img hidden class="mount mount-100" src="<?php echo URL_DIR ?>assets/img/form/mounting/mount-100.png" alt="<?php echo $lang['PAGE_MOUNTING_OPTION_11']; ?>">
                                <br>
                                <span class="mount mount-0"><?php echo $lang['PAGE_MOUNTING_OPTION_1']; ?></span>
                                <span hidden class="mount mount-10"><?php echo $lang['PAGE_MOUNTING_OPTION_2']; ?></span>
                                <span hidden class="mount mount-20"><?php echo $lang['PAGE_MOUNTING_OPTION_3']; ?></span>
                                <span hidden class="mount mount-30"><?php echo $lang['PAGE_MOUNTING_OPTION_4']; ?></span>
                                <span hidden class="mount mount-40"><?php echo $lang['PAGE_MOUNTING_OPTION_5']; ?></span>
                                <span hidden class="mount mount-50"><?php echo $lang['PAGE_MOUNTING_OPTION_6']; ?></span>
                                <span hidden class="mount mount-60"><?php echo $lang['PAGE_MOUNTING_OPTION_7']; ?></span>
                                <span hidden class="mount mount-70"><?php echo $lang['PAGE_MOUNTING_OPTION_8']; ?></span>
                                <span hidden class="mount mount-80"><?php echo $lang['PAGE_MOUNTING_OPTION_9']; ?></span>
                                <span hidden class="mount mount-90"><?php echo $lang['PAGE_MOUNTING_OPTION_10']; ?></span>
                                <span hidden class="mount mount-100"><?php echo $lang['PAGE_MOUNTING_OPTION_11']; ?></span>

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
                        <h1><?php echo $lang['PAGE_WALKING_CONFIDENCE_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_WALKING_CONFIDENCE_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <p><?php echo $lang['PAGE_WALKING_CONFIDENCE_QUESTION_1']; ?></p>
                                <label>
                                    <?php echo $lang['Yes']; ?>
                                    <input type="radio" name="walking-confidence-1" value="0" />
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['NO']; ?>
                                    <input type="radio" name="walking-confidence-1" value="20" />
                                    <span class="checkmark"></span>
                                </label>

                                <p><?php echo $lang['PAGE_WALKING_CONFIDENCE_QUESTION_2'] ?></p>
                                <label>
                                    <?php echo $lang['NO']; ?>
                                    <input type="radio" name="walking-confidence-2" value="60"/>
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_CONFIDENCE_OPTION_1']; ?>
                                    <input type="radio" name="walking-confidence-2" value="40" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_CONFIDENCE_OPTION_2']; ?>
                                    <input type="radio" name="walking-confidence-2" value="20" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_WALKING_CONFIDENCE_OPTION_3']; ?>
                                    <input type="radio" name="walking-confidence-2" value="0" />
                                    <span class="checkmark"></span>
                                </label>

                                <p><?php echo $lang['PAGE_WALKING_CONFIDENCE_QUESTION_3']; ?></p>
                                <label>
                                    <?php echo $lang['Yes']; ?>
                                    <input type="radio" name="walking-confidence-3" value="0" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['NO']; ?>
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
                        <h1><?php echo $lang['PAGE_FEAR_OF_HEIGHTS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_FEAR_OF_HEIGHTS_SUBTITLE']; ?></p>
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
                        <h1><?php echo $lang['PAGE_BALANCE_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_BALANCE_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <label>
                                    <?php echo $lang['PAGE_BALANCE_OPTION_1']; ?>
                                    <input type="radio" name="balance" value="100" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_BALANCE_OPTION_2']; ?>
                                    <input type="radio" name="balance" value="50" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_BALANCE_OPTION_3']; ?>
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
                        <h1><?php echo $lang['PAGE_PAIN_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_PAIN_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="checkboxes white-container">
                                <label>
                                    <?php echo $lang['PAGE_PAIN_OPTION_1']; ?>
                                    <input type="checkbox" class="pain" name="pain-1" value="25">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_PAIN_OPTION_2']; ?>
                                    <input type="checkbox" class="pain" name="pain-2" value="25">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_PAIN_OPTION_3']; ?>
                                    <input type="checkbox" class="pain" name="pain-3" value="25">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_PAIN_OPTION_4']; ?>
                                    <input type="checkbox" class="pain" name="pain-4" value="25">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_PAIN_OPTION_5']; ?>
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
                        <h1><?php echo $lang['PAGE_MOBILITY_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_MOBILITY_SUBTITLE']; ?></p>
                        <div class="col-12">
                            <div class="checkboxes white-container">
                                <label>
                                    <?php echo $lang['PAGE_MOBILITY_OPTION_1']; ?>
                                    <input type="checkbox" name="mobility-1" class="no-mobility" value="33">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_MOBILITY_OPTION_2']; ?>
                                    <input type="checkbox" name="mobility-2" class="no-mobility" value="34">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_MOBILITY_OPTION_3']; ?>
                                    <input type="checkbox" name="mobility-3" class="no-mobility" value="33">
                                    <span class="checkmark"></span>
                                </label>
                                <label>
                                    <?php echo $lang['PAGE_MOBILITY_OPTION_4']; ?>
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
                        <h1><?php echo $lang['PAGE_ROOTS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_ROOTS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="roots" class="img-carousel count-5">

                                    <img  value="0" class="img-0-roots selected" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-0.jpg" alt="<?php echo $lang['PAGE_ROOTS_OPTION_1']; ?>">
                                    <img  value="25" class="img-25-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-1.jpg" alt="<?php echo $lang['PAGE_ROOTS_OPTION_2']; ?>">
                                    <img value="50" class="img-50-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-2.jpg" alt="<?php echo $lang['PAGE_ROOTS_OPTION_3']; ?>">
                                    <img value="75" class="img-75-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-3.jpg" alt="<?php echo $lang['PAGE_ROOTS_OPTION_4']; ?>">
                                    <img value="100" class="img-100-roots" src="<?php echo URL_DIR ?>assets/img/form/roots/roots-4.jpg" alt="<?php echo $lang['PAGE_ROOTS_OPTION_5']; ?>">

                                    <span class="img-0-roots selected"><?php echo $lang['PAGE_ROOTS_OPTION_1']; ?></span>
                                    <span class="img-25-roots"><?php echo $lang['PAGE_ROOTS_OPTION_2']; ?></span>
                                    <span class="img-50-roots"><?php echo $lang['PAGE_ROOTS_OPTION_3']; ?></span>
                                    <span class="img-75-roots"><?php echo $lang['PAGE_ROOTS_OPTION_4']; ?></span>
                                    <span class="img-100-roots"><?php echo $lang['PAGE_ROOTS_OPTION_5']; ?></span>

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
                        <h1><?php echo $lang['PAGE_ROCKS_TITLE'] ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_ROCKS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="rocks" class="img-carousel count-5">

                                    <img value="0"  class="img-0-rocks selected" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-0.jpg" alt="<?php echo $lang['PAGE_ROCKS_OPTION_1']; ?>">
                                    <img value="25" class="img-25-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-1.jpg" alt="<?php echo $lang['PAGE_ROCKS_OPTION_2']; ?>">
                                    <img value="50" class="img-50-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-2.jpg" alt="<?php echo $lang['PAGE_ROCKS_OPTION_3']; ?>">
                                    <img value="75" class="img-75-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-3.jpg" alt="<?php echo $lang['PAGE_ROCKS_OPTION_1']; ?>">
                                    <img value="100" class="img-100-rocks" src="<?php echo URL_DIR ?>assets/img/form/rocks/rocks-4.jpg" alt="<?php echo $lang['PAGE_ROCKS_OPTION_4']; ?>">

                                    <span class="img-0-rocks selected"><?php echo $lang['PAGE_ROCKS_OPTION_1']; ?></span>
                                    <span class="img-25-rocks"><?php echo $lang['PAGE_ROCKS_OPTION_2']; ?></span>
                                    <span class="img-50-rocks"><?php echo $lang['PAGE_ROCKS_OPTION_3']; ?></span>
                                    <span class="img-75-rocks"><?php echo $lang['PAGE_ROCKS_OPTION_4']; ?></span>
                                    <span class="img-100-rocks"><?php echo $lang['PAGE_ROCKS_OPTION_5']; ?></span>

                                </div>
                                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="rocks">
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
                        <h1><?php echo $lang['PAGE_BUMPINESS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_BUMPINESS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="bumps" class="img-carousel count-5">

                                    <img value="0"  class="img-0-bumps selected" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-0.jpg" alt="<?php echo $lang['PAGE_BUMPINESS_OPTION_1']; ?>">
                                    <img value="1" class="img-25-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-1.jpg" alt="<?php echo $lang['PAGE_BUMPINESS_OPTION_2']; ?>">
                                    <img value="2" class="img-50-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-2.jpg" alt="<?php echo $lang['PAGE_BUMPINESS_OPTION_3']; ?>">
                                    <img value="3" class="img-75-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-3.jpg" alt="<?php echo $lang['PAGE_BUMPINESS_OPTION_4']; ?>">
                                    <img value="4" class="img-100-bumps" src="<?php echo URL_DIR ?>assets/img/form/bumps/bumps-4.jpg" alt="<?php echo $lang['PAGE_BUMPINESS_OPTION_5']; ?>">

                                    <span class="img-0-bumps selected"><?php echo $lang['PAGE_BUMPINESS_OPTION_1']; ?></span>
                                    <span class="img-25-bumps"><?php echo $lang['PAGE_BUMPINESS_OPTION_2']; ?></span>
                                    <span class="img-50-bumps"><?php echo $lang['PAGE_BUMPINESS_OPTION_3']; ?></span>
                                    <span class="img-75-bumps"><?php echo $lang['PAGE_BUMPINESS_OPTION_4']; ?></span>
                                    <span class="img-100-bumps"><?php echo $lang['PAGE_BUMPINESS_OPTION_5']; ?></span>

                                </div>
                                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="bumps">
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
                        <h1><?php echo $lang['PAGE_CLIMBING_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_CLIMBING_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="climbing" class="img-carousel count-5">

                                    <img value="0"  class="img-0-climbing selected" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-0.jpg" alt="<?php echo $lang['PAGE_CLIMBING_OPTION_1']; ?>">
                                    <img value="25" class="img-25-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-1.jpg" alt="<?php echo $lang['PAGE_CLIMBING_OPTION_2']; ?>">
                                    <img value="50" class="img-50-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-2.jpg" alt="<?php echo $lang['PAGE_CLIMBING_OPTION_3']; ?>">
                                    <img value="75" class="img-75-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-3.jpg" alt="<?php echo $lang['PAGE_CLIMBING_OPTION_4']; ?>">
                                    <img value="100" class="img-100-climbing" src="<?php echo URL_DIR ?>assets/img/form/climbing/climbing-4.jpg" alt="<?php echo $lang['PAGE_CLIMBING_OPTION_5']; ?>">

                                    <span class="img-0-climbing selected"><?php echo $lang['PAGE_CLIMBING_OPTION_1']; ?></span>
                                    <span class="img-25-climbing"><?php echo $lang['PAGE_CLIMBING_OPTION_2']; ?></span>
                                    <span class="img-50-climbing"><?php echo $lang['PAGE_CLIMBING_OPTION_3']; ?></span>
                                    <span class="img-75-climbing"><?php echo $lang['PAGE_CLIMBING_OPTION_4']; ?></span>
                                    <span class="img-100-climbing"><?php echo $lang['PAGE_CLIMBING_OPTION_5']; ?></span>

                                </div>
                                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="climbing">
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
                        <h1><?php echo $lang['PAGE_DESCENT_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_DESCENT_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="descent" class="img-carousel count-5">

                                    <img value="0"  class="img-0-descent selected" src="<?php echo URL_DIR ?>assets/img/form/descent/descent-0.jpg" alt="<?php echo $lang['PAGE_DESCENT_OPTION_1']; ?>">
                                    <img value="25" class="img-25-descent" src="<?php echo URL_DIR ?>assets/img/form/descent/descent-1.jpg" alt="<?php echo $lang['PAGE_DESCENT_OPTION_2']; ?>">
                                    <img value="50" class="img-50-descent" src="<?php echo URL_DIR ?>assets/img/form/descent/descent-2.jpg" alt="<?php echo $lang['PAGE_DESCENT_OPTION_3']; ?>">
                                    <img value="75" class="img-75-descent" src="<?php echo URL_DIR ?>assets/img/form/descent/descent-3.jpg" alt="<?php echo $lang['PAGE_DESCENT_OPTION_4']; ?>">
                                    <img value="100" class="img-100-descent" src="<?php echo URL_DIR ?>assets/img/form/descent/descent-4.jpg" alt="<?php echo $lang['PAGE_DESCENT_OPTION_5']; ?>">

                                    <span class="img-0-descent selected"><?php echo $lang['PAGE_DESCENT_OPTION_1']; ?></span>
                                    <span class="img-25-descent"><?php echo $lang['PAGE_DESCENT_OPTION_2']; ?></span>
                                    <span class="img-50-descent"><?php echo $lang['PAGE_DESCENT_OPTION_3']; ?></span>
                                    <span class="img-75-descent"><?php echo $lang['PAGE_DESCENT_OPTION_4']; ?></span>
                                    <span class="img-100-descent"><?php echo $lang['PAGE_DESCENT_OPTION_5']; ?></span>

                                </div>
                                <input type="range" min="0" max="100" value="0" step="25" class="slider" name="descent">
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
                        <h1><?php echo $lang['PAGE_FLATNESS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_FLATNESS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="flatness" class="img-carousel count-5">

                                    <img value="0" class="img-0-flatness selected" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-0.jpg" alt="<?php echo $lang['PAGE_FLATNESS_OPTION_1']; ?>">
                                    <img value="25" class="img-25-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-1.jpg" alt="<?php echo $lang['PAGE_FLATNESS_OPTION_2']; ?>">
                                    <img value="50" class="img-50-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-2.jpg" alt="<?php echo $lang['PAGE_FLATNESS_OPTION_3']; ?>">
                                    <img value="75" class="img-75-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-3.jpg" alt="<?php echo $lang['PAGE_FLATNESS_OPTION_4']; ?>">
                                    <img value="100" class="img-100-flatness" src="<?php echo URL_DIR ?>assets/img/form/flatness/flatness-4.jpg" alt="<?php echo $lang['PAGE_FLATNESS_OPTION_5']; ?>">

                                    <span class="img-0-flatness selected"><?php echo $lang['PAGE_FLATNESS_OPTION_1']; ?></span>
                                    <span class="img-25-flatness"><?php echo $lang['PAGE_FLATNESS_OPTION_2']; ?></span>
                                    <span class="img-50-flatness"><?php echo $lang['PAGE_FLATNESS_OPTION_3']; ?></span>
                                    <span class="img-75-flatness"><?php echo $lang['PAGE_FLATNESS_OPTION_4']; ?></span>
                                    <span class="img-100-flatness"><?php echo $lang['PAGE_FLATNESS_OPTION_5']; ?></span>

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
                        <h1><?php echo $lang['PAGE_BRIDGES_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_BRIDGES_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="bridges" class="img-carousel count-5">

                                    <img value="0" class="img-0-bridges selected" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-0.jpg" alt="<?php echo $lang['PAGE_BRIDGES_OPTION_1']; ?>">
                                    <img value="25" class="img-25-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-1.jpg" alt="<?php echo $lang['PAGE_BRIDGES_OPTION_2']; ?>">
                                    <img value="50" class="img-50-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-2.jpg" alt="<?php echo $lang['PAGE_BRIDGES_OPTION_3']; ?>">
                                    <img value="75" class="img-75-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-3.jpg" alt="<?php echo $lang['PAGE_BRIDGES_OPTION_4']; ?>">
                                    <img value="100" class="img-100-bridges" src="<?php echo URL_DIR ?>assets/img/form/bridges/bridges-4.jpg" alt="<?php echo $lang['PAGE_BRIDGES_OPTION_5']; ?>">

                                    <span class="img-0-bridges selected"><?php echo $lang['PAGE_BRIDGES_OPTION_1']; ?></span>
                                    <span class="img-25-bridges"><?php echo $lang['PAGE_BRIDGES_OPTION_2']; ?></span>
                                    <span class="img-50-bridges"><?php echo $lang['PAGE_BRIDGES_OPTION_3']; ?></span>
                                    <span class="img-75-bridges"><?php echo $lang['PAGE_BRIDGES_OPTION_4']; ?></span>
                                    <span class="img-100-bridges"><?php echo $lang['PAGE_BRIDGES_OPTION_5']; ?></span>

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
                        <h1><?php echo $lang['PAGE_RIDGES_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_RIDGES_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="ridges" class="img-carousel count-5">

                                    <img value="0" class="img-0-ridges selected" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-0.jpg" alt="<?php echo $lang['PAGE_RIDGES_OPTION_1']; ?>">
                                    <img value="25" class="img-25-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-1.jpg" alt="<?php echo $lang['PAGE_RIDGES_OPTION_2']; ?>">
                                    <img value="50" class="img-50-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-2.jpg" alt="<?php echo $lang['PAGE_RIDGES_OPTION_3']; ?>">
                                    <img value="75" class="img-75-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-3.jpg" alt="<?php echo $lang['PAGE_RIDGES_OPTION_4']; ?>">
                                    <img value="100" class="img-100-ridges" src="<?php echo URL_DIR ?>assets/img/form/ridges/ridges-4.jpg" alt="<?php echo $lang['PAGE_RIDGES_OPTION_5']; ?>">

                                    <span class="img-0-ridges selected"><?php echo $lang['PAGE_RIDGES_OPTION_1']; ?></span>
                                    <span class="img-25-ridges"><?php echo $lang['PAGE_RIDGES_OPTION_2']; ?></span>
                                    <span class="img-50-ridges"><?php echo $lang['PAGE_RIDGES_OPTION_3']; ?></span>
                                    <span class="img-75-ridges"><?php echo $lang['PAGE_RIDGES_OPTION_4']; ?></span>
                                    <span class="img-100-ridges"><?php echo $lang['PAGE_RIDGES_OPTION_5']; ?></span>

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
                        <h1><?php echo $lang['PAGE_PATH_NARROWNESS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_PATH_NARROWNESS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="path-narrowness" class="img-carousel count-5">

                                    <img value="0" class="img-0-path-narrowness selected" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-0.jpg" alt="<?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_1']; ?>">
                                    <img value="25" class="img-25-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-1.jpg" alt="<?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_2']; ?>">
                                    <img value="50" class="img-50-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-2.jpg" alt="<?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_3']; ?>">
                                    <img value="75" class="img-75-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-3.jpg" alt="<?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_4']; ?>">
                                    <img value="100" class="img-100-path-narrowness" src="<?php echo URL_DIR ?>assets/img/form/path-narrowness/path-narrowness-4.jpg" alt="<?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_5']; ?>">

                                    <span class="img-0-path-narrowness selected"><?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_1']; ?></span>
                                    <span class="img-25-path-narrowness"><?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_2']; ?></span>
                                    <span class="img-50-path-narrowness"><?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_3']; ?></span>
                                    <span class="img-75-path-narrowness"><?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_4']; ?></span>
                                    <span class="img-100-path-narrowness"><?php echo $lang['PAGE_PATH_NARROWNESS_OPTION_5']; ?></span>

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
                        <h1><?php echo $lang['PAGE_HANDRAILS_TITLE']; ?></h1>
                        <p class="thin-text"><?php echo $lang['PAGE_HANDRAILS_SUBTITLE']; ?></p>
                        <div class="col-12">

                            <div class="preview-slider white-container">
                                <div id="handrails" class="img-carousel count-5">


                                    <img value="0" class="img-0-handrails selected" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-4.jpg" alt="<?php echo $lang['PAGE_HANDRAILS_OPTION_5']; ?>">
                                    <img value="25" class="img-25-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-3.jpg" alt="<?php echo $lang['PAGE_HANDRAILS_OPTION_4']; ?>">
                                    <img value="50" class="img-50-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-2.jpg" alt="<?php echo $lang['PAGE_HANDRAILS_OPTION_3']; ?>">
                                    <img value="75" class="img-75-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-1.jpg" alt="<?php echo $lang['PAGE_HANDRAILS_OPTION_2']; ?>">
                                    <img value="100" class="img-100-handrails" src="<?php echo URL_DIR ?>assets/img/form/handrails/handrails-0.jpg" alt="<?php echo $lang['PAGE_HANDRAILS_OPTION_1']; ?>">

                                    <span class="img-100-handrails"><?php echo $lang['PAGE_HANDRAILS_OPTION_5']; ?></span>
                                    <span class="img-75-handrails"><?php echo $lang['PAGE_HANDRAILS_OPTION_4']; ?></span>
                                    <span class="img-50-handrails"><?php echo $lang['PAGE_HANDRAILS_OPTION_3']; ?></span>
                                    <span class="img-25-handrails"><?php echo $lang['PAGE_HANDRAILS_OPTION_2']; ?></span>
                                    <span class="img-0-handrails selected"><?php echo $lang['PAGE_HANDRAILS_OPTION_1']; ?></span>

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
                        <h1></h1>
                        <p class="thin-text"></p>
                        <div class="col-12">
                            <div class="radio-buttons white-container">
                                <label>
                                    <?php echo $lang['PAGE_TIME_OPTION_1']; ?>
                                    <input type="radio" name="time" value="0" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_TIME_OPTION_2']; ?>
                                    <input type="radio" name="time" value="50" />
                                    <span class="checkmark"></span>
                                </label>

                                <label>
                                    <?php echo $lang['PAGE_TIME_OPTION_3']; ?>
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
