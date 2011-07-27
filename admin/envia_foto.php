<?php

  $ponteiro_arquivo=$_FILES["ARQUIVO"]["tmp_name"];
  $nome_real_arquivo=$_FILES["ARQUIVO"]["name"];
  $tipo_arquivo=$_FILES["ARQUIVO"]["type"];
  $tamanho_arquivo=$_FILES["ARQUIVO"]["size"] / 1024; //Tamanho em Kb 
  $album_da_foto=$_POST["ALBUM_NOME"]; 

  $caminho = "imagens/".$album_da_foto."/".$nome_real_arquivo;  
  
  //Verificacoes de seguranca
  if(!(stristr($tipo_arquivo, 'image'))  or $tamanho_arquivo >= 10000 or $tamanho_arquivo <= 1 or $album_da_foto == ""){
    echo "<script>alert('Arquivo ou album invalido'); window.history.back()</script>";
    die(); 
  }

  if(move_uploaded_file($ponteiro_arquivo, $caminho)){
    echo "<script>alert('Imagem armazenada com sucesso'); window.history.back()</script>";
  }else{
    echo "<script>alert('Erro ao enviar arquivo'); window.history.back()</script>";
  }
?>
