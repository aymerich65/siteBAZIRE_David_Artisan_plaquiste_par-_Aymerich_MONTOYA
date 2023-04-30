<?php
ob_start();
?>
<div class="accueilportrait">
  <div class="row pageaccueilstyle justify-content-between align-items-center">
    <div class="col-md-6 colaccueilstyle01">
      <p class="prestations01" ><p class="styleprestationtitle1">ISOLATION<br></p>
       Cloisons<br>
        Plafonds<br>
        Faux plafonds<br>
        Doublages <br></p>
      <p class="prestations02" ><p class="styleprestationtitle2">MENUISERIES<br></p>
          Aluminium<br>
        PVC<br>
        Bois<br>
        Pose de parquets<br></p>
    </div>
    <div class="col-md-6 colaccueilstyle02">
      <img class="imgaccueil01 img-fluid" src="images/pose_d'un_revetement.jpg" alt="image de travaux">
      
      <img class="imgaccueil02 img-fluid" src="images/amenagement_de_combles_photo_1_.jpg" alt="image de travaux">
 


    </div>
  </div>
</div>










<div class="accueillandscape">


    <div class="blocisolation">
      <p class="prestations01" ><p class="styleprestationtitle2">ISOLATION<br></p>
        Cloisons<br>
        Plafonds<br>
        Faux plafonds<br>
        Doublages <br></p> 
    </div>
    <div class="blocmenuiseries">
      <p class="prestations02" ><p class="styleprestationtitle1">MENUISERIES<br></p>
        Aluminium<br>
        PVC<br>
        Bois<br>
        Pose de parquets<br></p>
    </div>

      <img class="imgaccueil01" src="images/pose_d'un_revetement.jpg" alt="image de travaux">
      
      <img class="imgaccueil02" src="images/amenagement_de_combles_photo_1_.jpg" alt="image de travaux">
 



  </div>


<?php
$contenu = ob_get_clean();
require_once 'Layout.php';


