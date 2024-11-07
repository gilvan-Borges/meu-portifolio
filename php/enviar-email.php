<?php
  // Verificação e sanitização das variáveis
  $nome = isset($_POST['nome']) ? htmlspecialchars(trim($_POST['nome'])) : '';
  $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
  $mensagem = isset($_POST['mensagem']) ? htmlspecialchars(trim($_POST['mensagem'])) : '';
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  // Verificação se os campos obrigatórios estão preenchidos
  if (empty($nome) || empty($email) || empty($mensagem)) {
    echo "Todos os campos são obrigatórios.";
    exit;
  }

  // Validação do e-mail
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail inválido.";
    exit;
  }

  // Compo E-mail
  $arquivo = "
    Nome: $nome<br>
    E-mail: $email<br>
    Mensagem: $mensagem<br>
    Este e-mail foi enviado em $data_envio às $hora_envio
  ";
  
  // Emails para quem será enviado o formulário
  $destino = "gilvan2022borges@gmail.com";
  $assunto = "Contato pelo Site";

  // Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  // Enviar
  if (mail($destino, $assunto, $arquivo, $headers)) {
    echo "E-mail enviado com sucesso.";
  } else {
    echo "Falha ao enviar o e-mail.";
  }
  
  echo "<meta http-equiv='refresh' content='10;URL=../index.html'>";
?>