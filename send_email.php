<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir o autoload do Composer
require '../vendor/autoload.php';

// Função para sanitizar os dados de entrada
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar e sanitizar os dados do formulário
    $nome = sanitize_input($_POST['nome']);
    $email = sanitize_input($_POST['email']);
    $telefone = sanitize_input($_POST['telefone']);
    $servicoInteresse = sanitize_input($_POST['servicoInteresse']);
    $mensagem = sanitize_input($_POST['mensagem']);

    // Validar e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /index.php?error=1");
        exit();
    }

    // Montar o corpo do e-mail
    $body = "Olá MWM Softwares,\n\n";
    $body .= "Gostaria de solicitar um pré-orçamento com as seguintes informações:\n\n";
    $body .= "Nome: $nome\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefone: $telefone\n";
    $body .= "Serviço de Interesse: $servicoInteresse\n";
    $body .= "Mensagem:\n$mensagem\n";

    // Configurar o PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        // Se estiver usando SMTP, configure aqui
        // $mail->isSMTP();
        // $mail->Host       = 'smtp.exemplo.com';
        // $mail->SMTPAuth   = true;
        // $mail->Username   = 'seu_usuario_smtp';
        // $mail->Password   = 'sua_senha_smtp';
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port       = 587;

        // Remetente e destinatário
        $mail->setFrom('no-reply@darkboxkit.com', 'MWM Softwares');
        $mail->addAddress('mwmechnology@gmail.com', 'MWM Softwares');

        // Conteúdo do e-mail
        $mail->isHTML(false);
        $mail->Subject = 'Pré-Orçamento MWM Softwares';
        $mail->Body    = $body;

        $mail->send();
        header("Location: /index.php?success=1");
        exit();
    } catch (Exception $e) {
        // Opcional: registrar o erro em um log
        error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}");
        header("Location: /index.php?error=1");
        exit();
    }
} else {
    // Acesso direto sem POST
    header("Location: /index.php");
    exit();
}
?>
