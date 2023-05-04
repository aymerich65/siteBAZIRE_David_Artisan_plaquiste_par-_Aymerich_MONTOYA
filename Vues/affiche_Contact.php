<?php
ob_start();
?>

<div class="pagecontactstyle">

   <div class="divh1">
      <h1 class="h1contactstyle">Contactez moi</h1> 
   </div>
      <div class="bloctextcontact">
         <p>N'hésitez pas à me contacter par téléphone ou par e-mail, je suis disponible pour répondre à toutes vos questions et pour vous conseiller sur la meilleure façon de réaliser votre projet.</p>
      </div>
      
         <p class="h2telstyle">Téléphone : <span>0674582483</span></p>
         <div class="blocmail">
         <div class="">
            <p class="">Contact par e-mail:
               <a class="ancremail" href="mailto:baziredavid88@gmail.com">Cliquez ici<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="my-iconfooter  bi bi-envelope " viewBox="0 0 16 16">
                     <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                  </svg></a>
            </p>
         </div>
      </div>
  
</div>
<?php
$contenu = ob_get_clean();
require_once 'Layout.php';
