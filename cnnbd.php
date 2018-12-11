<?php

//Conexi�n ECP
function Conectarse(){
   if (!($link = mysqli_connect("localhost","root",""))){
      echo "Error 31.";
      exit();
   }
   
   if (!mysqli_select_db($link,"ECP_Sent_Cargo"))
   {
      echo "Error 32.";
      exit();
   }
   
   return $link;
}

?>