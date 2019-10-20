<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root','seremisaludix');
			echo "paso ";
            mysql_select_db('bodega', $con);
       
            $sql = mysql_query("SELECT sum(stock) as stock FROM productos WHERE codigoproducto = '".$b."'",$con);
             
            $contar = mysql_num_rows($sql);
           $reg = mysql_fetch_array($sql, MYSQL_BOTH);  
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:red;'>Codigo de barra no registrado.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:green;'>El stock disponible es de:" .$reg[0]."</span>";
            }
      }     
?>