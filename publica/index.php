<!--
 
   Essa pagina funcionara da seguinte maneira:
   - Mostrará uma imagem representando o album;
   - Ao clicar num album, abre uma pagina pop-up
     com as fotos e setas para caminhar nas fotos.

 -->

<html>

<title>Galeria de imagens</title>
<head><center>Galeria de Imagens</center></head><hr>

  <body>
   <center> <table name="ALBUMS">
   
    <?php
       
       $dir    = '../admin/imagens';
       $albums = array_slice(scandir($dir),2);
       $numero_de_albums = 0;
       print "<tr>";//Começa uma linha       

       foreach($albums as $album){
        
        //Pega o primeiro nome de foto e transforma em string (implode)
        $nome_foto_album = implode("|", array_slice(scandir($dir."/".$album),2,1) );
        $caminho_foto_album = $dir."/".$album."/".$nome_foto_album;      

        if($numero_de_albums < 5){
          
          print "<td>"."<a href='caminho_do_album.php'><img src=".$caminho_foto_album." height='90' width='90'></a></td>";
          $numero_de_albums++;
          
        }else{

          $numero_de_albums = 0;
          print "</tr><tr>";

        }  
         
       }

       print "</tr>";//Termina uma linha
  
    ?>
      
    </table></center> 
  </body>

</html>
