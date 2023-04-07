<div class="gallerybackground">
<div class="h1gallerystyle"><h1 cl>Réalisations</h1></div>
<div class="gallerybloc image-container">



  <img class="gallery-image active" src="images/IMG_000211.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_000411.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_001311.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_001411.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_141611.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_141811.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_142011.jpg" alt="image de travaux">
  <img class="gallery-image" src="images/IMG_142511.jpg" alt="image de travaux">
</div>
<div class="gallerybuttonline">

<svg onclick="prevImage()" xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-left-square my-icon" viewBox="0 0 16 16" style="position:relative; left: 20%" >
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg>


<svg onclick="nextImage()" xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-square my-icon"  viewBox="0 0 16 16" style="position:absolute; right: 20%">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</div>
</div>






<script>
  var currentImage = 0;
  var numImages = 8;

  function nextImage() {
    var gallery = document.querySelector('.gallerybloc');
    var images = gallery.querySelectorAll('.image-container img');
    images[currentImage].classList.remove('active');
    currentImage++;
    if (currentImage >= numImages) {
      currentImage = 0;
    }
    images[currentImage].classList.add('active');
  }

  function prevImage() {
    var gallery = document.querySelector('.gallerybloc');
    var images = gallery.querySelectorAll('.image-container img');
    images[currentImage].classList.remove('active');
    currentImage--;
    if (currentImage < 0) {
      currentImage = numImages - 1;
    }
    images[currentImage].classList.add('active');
  }

  // afficher la première image au chargement de la page
  var gallery = document.querySelector('.gallerybloc');
  var images = gallery.querySelectorAll('.image-container img');
  images[0].classList.add('active');
</script>


