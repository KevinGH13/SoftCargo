<?php

//Conexión ECP
function Conectarse(){
   if (!($link = mysqli_connect("localhost","ECPglobodb2016","ECP%abc%globo%2016"))){
      echo "Error 31.";
      exit();
   }
   
   if (!mysqli_select_db($link,"ECP_Globo_Envios"))
   {
      echo "Error 32.";
      exit();
   }
   
   return $link;
}

?>