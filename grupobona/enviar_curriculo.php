<?php
  $dados = $_POST;
  include 'funcoes/validadores.php';
  include 'funcoes/arquivos.php';
  if (validar_curriculo($dados) == false) {
    header('location: curriculo.php?codigo=' .
$dados['empresa']);
    exit();
  }
  $nome = $dados['nome'];
  $email = $dados['email'];
  $cod_departamento = $dados['departamento'];
  $cod_empresa = $dados['empresa'];


  $foto = mover_arquivo($arquivos['foto'], 'foto');
  $curriculo = mover_arquivo($arquivos['curriculo'], 'curriculo');

$curriculo = mover_arquivo($arquivos['curriculo'], 'curriculo');

  include 'funcoes/emails.php';
  agradecer_contato($nome, $email);
  enviar_curriculo_email(
    array('nome' => $nome, 'email' => $email),
    array('foto' => $foto, 'curriculo' => $curriculo)
  );

  header('location: curriculo_cadastrado.php');
  exit();

?>