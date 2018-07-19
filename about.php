<?php
require_once('header.php');
?>
<main class="bg5">
  <section class="page active">
    <div class="container">
      <div class="row">
        <div id="about" class="col-12">
          <div class="text-container">
            <h1 class="center"><?php echo $lang['NAV_ABOUT']; ?></h1>
            <h2><?php echo $lang['PAGE_ABOUT_GENERAL_INFO_TITLE']; ?></h2>
            <p><?php echo $lang['PAGE_ABOUT_GENERAL_INFO']; ?></p>
            <p><?php echo $lang['PAGE_ABOUT_GENERAL_CREDIT']; ?> <a target="_blank" href="https://www.linkedin.com/in/mikko-lerto-617106133">Mikko Lerto</a>.</p>

            <h2 id="trails"><?php echo $lang['PAGE_ABOUT_HIKING_TRAILS_TITLE']; ?></h2>
            <h3><?php echo $lang['PAGE_ABOUT_HIKING_TRAILS']; ?></h3>
            <p>
              <?php echo $lang['PAGE_ABOUT_HIKING_TRAILS_TEXT']; ?>
            </p>
            <h3><?php echo $lang['PAGE_ABOUT_MOUNTAIN_TRAILS']; ?></h3>
            <p>
              <?php echo $lang['PAGE_ABOUT_MOUNTAIN_TRAILS_TEXT']; ?>
            </p>
          <h3><?php echo $lang['PAGE_ABOUT_ALPINE_ROUTES']; ?></h3>
          <p>
            <?php echo $lang['PAGE_ABOUT_ALPINE_ROUTES_TEXT']; ?>
          </p>
          <a target="_blank" href="https://www.schweizmobil.ch/en/hiking-in-switzerland/more-wl/hiking-trail-network-and-signalization.html"><?php echo $lang['PAGE_ABOUT_SOURCE']; ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>




<?php
require_once('footer.php');
?>
