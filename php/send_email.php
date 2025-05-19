    <?php
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $pesan = $_POST['pesan'];
    $email = $_POST['email'];
    $waktu = date("l, d-F-Y");

    $gambar = $_FILES['gambar'] ?? null;
    $gambarType = null;


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($gambar['tmp_name'], $gambar['name']);
    } 

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'websitedesangleses@gmail.com'; //SMTP username
        $mail->Password = 'isckgqcybiyoquck'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to

        //Recipients
        $mail->setFrom('websitedesangleses@gmail.com', 'Aduan Masyarakat');
        $mail->addAddress('kelurahanngleses@gmail.com', 'Kelurahan Desa Ngleses'); //Add a recipient
        $mail->addAddress('nandasyaelan@gmail.com', 'Syaelan');

        //Content
        $template = file_get_contents('templateMail.html');

        // Replace placeholders with form data
        $template = str_replace('{{nama}}', htmlspecialchars($nama), $template);
        $template = str_replace('{{alamat}}', htmlspecialchars($alamat), $template);
        $template = str_replace('{{no_hp}}', htmlspecialchars($no_hp), $template);
        $template = str_replace('{{email}}', htmlspecialchars($email), $template);
        $template = str_replace('{{pesan}}', nl2br(htmlspecialchars($pesan)), $template);
        $template = str_replace('{{waktu}}', htmlspecialchars($waktu), $template);
        // $template = str_replace('{{gambar}}', $gambarBase64, $template);

        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Form Kirim Pesan';
        $mail->Body = $template;
        $mail->AltBody = "Nama: $nama\nAlamat: $alamat\nNo HP: $no_hp\nPesan: $pesan";

        $mail->send();
        echo 'Message has been sent';
        header('Location: ../pengaduan.html?status=success');
exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>