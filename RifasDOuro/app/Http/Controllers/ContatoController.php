<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';


use App\Mail\ExemploEmail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('emails.contato_email');
    }

    public function store()
    {
        var_dump('send_contact');

        if(isset($_POST['enviar'])){

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'sandbox646bb51341ad4ccc8eba92520022de95.mailgun.org';  //Trocar pelo host do email da minha hospedagem
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'isaque.ixs@gmail.com';                     //SMTP username
                //$mail->Password   = 'Ixs71790297@tiktok'; //ou abaixo                            //SMTP password
                $mail->Password   = 'kfnc zqae ngcz jsub';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //ou abaixo //Enable implicit TLS encryption
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 465; // ou 587                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                ///Deve ser o mesmo email do username
                $mail->setFrom('isaque.ixs@gmail.com', 'Mailer');
                //para qual email quer enviar mensagens
                $mail->addAddress('isaque.ixs@gmail.com', 'Joe User');     //Add a recipient
                //se quiser mandar para mais de um é só adicionar abaixo como está a linha abaixo
                //$mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('isaque.ixs@gmail.com', 'Information');

                //adicionar cópia de email
               // $mail->addCC('cc@example.com');
                //adicionar cópia oculta de email
                //$mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);  
                //assunto                                //Set email format to HTML
                $mail->Subject = 'Mensagem via Site';

                 $body = "Mensagem enviada atrves do site, segue informações abaixo:<br>
                 Nome: ". $_POST['nome']." <br>
                 E-mail:". $_POST['email']." <br>
                 Mensagem: <br>".$_POST['msg'];

                // $body = "Mensagem enviada através do site, segue informações abaixo:<br>
                //     Nome: {$_POST['nome']} <br>
                //     E-mail: {$_POST['email']} <br>
                //     Mensagem: <br>
                //     {$_POST['msg']}";

                $mail->Body    = $body;

               //email em texto limpo sem html, reduz chance de cair em span
               //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Email enviado com sucesso!';
            } catch (Exception $e) {
                echo "Erro ao enviar o email: {$mail->ErrorInfo}";
                }

        }else{
            echo "Erro ao enviar o email, acesso não foi via formulário: {$mail->ErrorInfo}";
        }
    }
}
