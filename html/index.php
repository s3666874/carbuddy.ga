<?php include_once('includes/header.php') ?>

<div class="website-phrase">
  <h2>View our most popular cars below</h2>
</div>

<div class="website-banner">
  <img class="mySlides" src="images/Toyota_HiAce.jpg.jpg">
  <img class="mySlides" src="images/Ford_Ranger.jpg">
  <img class="mySlides" src="images/Mazda_CX-5.jpg">
  <img class="mySlides" src="images/Hyundai_i30.jpg">
  <img class="mySlides" src="images/Toyota_Corolla.jpg">

  <button class="banner-button banner-button-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="banner-button banner-button-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");

    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}

    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }

    x[slideIndex-1].style.display = "block";
  }
</script>

<?php include_once('includes/footer.php')?>
