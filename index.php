<!-- Codigo da pagina pura html/javascript -->

<html>

<title>Administração da galeria de imagens</title>
<head><b>Administração da galeria de imagens</b></head><hr>
  
  <script type="text/javascript">
   
     var alterado = false;
        
     //Funcao que verifica navegador e baseano nisso seta a varivel http
     function getHTTPObject() {
      var xmlhttp;
      /*@cc_on
      @if (@_jscript_version >= 5)
      try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        xmlhttp = false;
      }
      }
      @else
        xmlhttp = false;
      @end @*/
      if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        try {
         xmlhttp = new XMLHttpRequest();
        } catch (e) {
         xmlhttp = false;
        }
      }
       return xmlhttp;
     }
     
     var http = getHTTPObject();  //Objeto http 
  
     // Funcao para povoar o select com todos os albums
     function Relacionar(){
     
       if(alterado == false){
         
         povoaSelect();
         alterado = true;
       }
 
       if(document.forms[0].ALBUM.selectedIndex == 1){
         criarAlbum();
       }else{
         document.all.ALBUM_NOME.value = document.all.ALBUM.options[document.forms[0].ALBUM.selectedIndex].text;
       }

     }
      
     //Funcao de criacao de um novo album
     function criarAlbum(){
   
       var centro_w = screen.width/2;
       var centro_h = screen.height/2;

       var pos_h = centro_h-100;
       var pos_w = centro_w-150;
 
       window.open("novo_album.htm", "Novo Album","width=300,height=200,top="+pos_h+",left="+pos_w);
       window.location.reload(); //reload na pagina

     }

     //Recebe de lista_albums.php os nomes de albums e coloca no select
     function povoaSelect (){
       
       http.open("GET", "lista_albums.php?listar=1", true);
       http.onreadystatechange = alteraRespostaDoServer;
       http.send(null);
     } 

     //Faz o processamento dos resultados vindo do programa php
     function alteraRespostaDoServer(){
      
       campo_select = document.forms[0].ALBUM;
       
       if(http.readyState == 4){//Estado 4 finalizou o recebimento
         campo_select.options.length = 0;
         results = http.responseText.split(",");
        
         campo_select.options[0] = new Option("Selecionar album","");
         campo_select.options[1] = new Option("Criar novo album","");
       
         for(i = 0; i < results.length; i++){
           campo_select.options[i+2] = new Option(results[i],results[i]);
         }  
       }
     }

  </script>
  
 <body>

   <!-- Envio de fotos -->
   <div>
    <form name="enviaFoto" action="envia_foto.php" method="post" enctype="multipart/form-data">
       Album:<br>
       <select name="ALBUM" id="ALBUM" onmouseup="Relacionar();"></select><br>
       Foto:<br>
       <input type="file" name="ARQUIVO" id="IMG"><br>
       <input type="hidden" name="ALBUM_NOME" value="">
       <input type="submit" value="Enviar"><input type="reset" value="Apagar"><br>
    </form>
   </div>

  </body>

</html>
