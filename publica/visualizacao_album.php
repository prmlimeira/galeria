<!--  

   Pagina que faz a navegacao nas fotos 
   de um album. totalmente integrada php/html

 -->

<?php

  $album = $_GET["NOME_DO_ALBUM"];
  $posicao = 0;

?>

<html>

<title> Visualizando album <?php echo $album;  ?> </title>
<head> Album <?php echo $album;  ?>  </head><hr>

  <body>
    <?php

      
      $dir = "../admin/imagens/".$album;
      $fila_de_fotos = array_slice(scandir($dir),2);

      $end_foto = $dir."/".$fila_de_fotos[$posicao];      

      print "<center><img height='510' width='470' src='$end_foto' id='IMAGEM_CENTRAL'></center>";
      

    ?>
  </body>
  <!-- Posicoes devem ser alteradas ao usar folhas de estilos(CSS)  -->
  <div id="SETAS"> 
    <center>

      <?php
      
        //primeira opcao: tentar fazer um mecanismo com ajax
        //segunda opcao: criar um form e submeter toda vez ao programa php

      ?>      

    </center>
  </div>

</html>
