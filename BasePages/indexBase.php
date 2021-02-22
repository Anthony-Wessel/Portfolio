<div class="row">
  <h1 class="text-center" style="color:#FFFFFF">Anthony Wessel</h1>
</div>

<h5 style="color:#FFFFFF">I'm a recent Bradley University graduate with a major in Computer Science and minor in Math. I've spent the last 8 years programming using various languages and frameworks, and working on projects ranging from game development to robotics programming. My main interest is making games, but I am also learning about AI and Cloud Computing.</h5>

<br>
<br>

<div class="row">
  <div class="col">
    <h3 class="text-center" style="color:#CCCCCC">Prototypes</h3>
        <?php
          echo CreateSummaryCard("Content/Prototypes/CoinGolf.json");
          echo CreateSummaryCard("Content/Prototypes/MyTerrificTrees.json");
        ?>
        <br>
        <div class="row ms-auto me-auto" style="width:25vw">
          <?php echo CreateLinkCard("prototypes.php", "prototype"); ?>
        </div>
  </div>
</div>

<br>
<br>

<div class="row">
  <div class="col">
    <h3 class="text-center" style="color:#CCCCCC">VFX</h3>
    <div class="row">
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/VFX/Brazier.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/VFX/Corruption.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/VFX/Wireframe.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/VFX/Desaturation.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/VFX/Disintegrate.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateLinkCard("vfx.php", "vfx") ?>
      </div>
    </div>
  </div>
</div>

<br>
<br>

<div class="row">
  <div class="col">
    <h3 class="text-center" style="color:#CCCCCC">Art</h3>
    <div class="row">
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/Art/Plane.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/Art/DragonSword.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/Art/Axe.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/Art/SodaCan.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateSummaryCard("Content/Art/Character.json") ?>
      </div>
      <div class="col-4">
        <?php echo CreateLinkCard("art.php", "art") ?>
      </div>
    </div>
  </div>
</div>

<br>
<br>
