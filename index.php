<!-- Codigo da pagina pura html/javascript -->

<html>

<title>Administração da galeria de imagens</title>
<head><b>Administração da galeria de imagens</b></head><hr>
  
  <script type="text/javascript">
   
     var alterado = false;  
   
     // Funcao para povoar o select com todos os albums
     function Relacionar(){
     
       var albums=document.getElementById("ALBUM");
  
       if(alterado == false){
         albums.add(new Option("default","2"), null);
         alterado = true;
       }
 
       if(albums.selectedIndex == 1){
         criarAlbum();
       }

     }
      
     //Funcao de criacao de um novo album
     function criarAlbum(){
       window.alert("Criando album");
     } 

  </script>
  
 <body>

  <div>
  </div> 


   <!-- Envio de fotos -->
   <div>
    <form name="enviaFoto" action="envia_foto.php" method="post" enctype="multipart/form-data">
       Album:<br>
       <select name="ALBUM" id="ALBUM" onmouseup="Relacionar();"><option value="">selecione album <option value="NOVO_ALBUM">criar novo</select><br>
       Foto:<br>
       <input type="file" name="ARQUIVO" id="IMG"><br>
       <input type="submit" value="Enviar"><input type="reset" value="Apagar"><br>
    </form>
   </div>

  </body>

</html>
