<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $mensagem = trim($_POST['mensagem']);

    // Validação básica de campos
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, insira um email válido.";
        exit;
    }

    if (empty($nome) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Destinatário e assunto do email
    $to = "organizador@evento.com";  // Substitua com o email do organizador
    $subject = "Nova Inscrição para o Evento de Tibia";

    // Corpo do email
    $body = "Nome: $nome\nEmail: $email\nMensagem: $mensagem";

    // Cabeçalhos
    $headers = "From: $email";

    // Enviar email
    if (mail($to, $subject, $body, $headers)) {
        echo "Inscrição enviada com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar a inscrição. Tente novamente.";
    }
}
?>
