<?php

    use PHPMailer\PHPMailer\PHPMailer;

    require_once '../vendor/autoload.php';
    // <img style=\"width:2rem;margin-bottom: -1rem;\"
    // src='https://raw.githubusercontent.com/GEOHORIZON/EmailResources/main/email_logo.png'
    // alt=\"\">
    // <div style=\"font-size: small; float: right;color:white;margin-top: -1rem;\">We navigate the
    // future</div>

    $link = "www.sge.com";

    $pre = "<body style='margin:1%;box-sizing: border-box;'>
    <div>
        <table
            style='width: 100%;background-image: url(https://raw.githubusercontent.com/GEOHORIZON/EmailResources/main/email_background.jpg);'>
            <tr>
                <td
                    style='text-align: center;font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;width: 100%;padding: 10px;padding-bottom: 20px;'>
                    <div style='width: fit-content;margin: auto;'>
                        <h1 style='padding:10px;margin:0px;font-size:xx-large;font-style: italic;color: white;'>
                            GEO HORIZON'22
                        </h1>
                    </div>
                </td>
            </tr>
        </table>
        <div style='padding: 10px;min-height: 200px;'>";
   
 
    
    $pos = " </div>
    <footer>
        <table cellpadding='0' cellspacing='0'
            style='border-spacing:0px;border-collapse:collapse;color:rgb(68,68,68);width:100%;font-size:10pt;font-family:Arial,sans-serif'>
            <tbody>
                <tr>
                    <td valign='top' colspan='2'
                        style='padding:10px;font-size:14pt;color:rgb(0,14,88);font-family:Arial,sans-serif;width:514px;vertical-align:top'>
                        <span style='font-weight:700'><span style='font-size:14pt;color:rgb(53 80 154)'>Society of
                                Geo-Informatics Engineers</span></span><br><span
                            style='font-size:10pt;color:rgb(135,135,135)'>Geo-Informatics, IRS</span></td>
                </tr>
                <tr>
                    <td valign='top' colspan='2'
                        style='padding:10px;font-size:10pt;border-top:1px solid rgb(53 80 154);color:rgb(44,44,44);font-family:Arial,sans-serif;vertical-align:top'>
                        <span style='font-size:10pt'>CEG, Anna
                            University<br></span><span style='font-size:10pt'>Chennai - 25<br></span><span
                            style='font-size:10pt'>phone: +91 9952901266 | +91 9597058455<br></span><span
                            style='font-size:10pt'>email:
                            <a href='mailto:geohorizon22@gmail.com' target='_blank'>geohorizon22@gmail.com</a>
                            <br></span>
                        <span style='font-size:10pt'>Website:
                            <a href='$link' target='_blank'>$link</a>
                            <br></span></td>
                </tr>
                <tr>
                    <td valign='top' align='right'
                        style='padding:10px;font-size:10pt;font-family:Arial,sans-serif;vertical-align:top;text-align:right'>
                        <span><a href='https://www.linkedin.com/company/society-of-geo-informatics-engineers'
                                rel='noopener' style='background-color:transparent;color:rgb(53 80 154)'
                                target='_blank'><img alt='LinkedIn icon' border='0' width='16' height='16'
                                    src='https://www.mail-signatures.com/signature-generator/img/templates/sky/ln.png'
                                    style='border:0px;vertical-align:middle;height:16px;width:16px'></a>&nbsp;</span><span><a
                                href='https://instagram.com/_sge_official?igshid=YmMyMTA2M2Y=' rel='noopener'
                                style='background-color:transparent;color:rgb(53 80 154)' target='_blank'><img
                                    alt='Instagram icon' border='0' width='16' height='16'
                                    src='https://www.mail-signatures.com/signature-generator/img/templates/sky/it.png'
                                    style='border:0px;vertical-align:middle;height:16px;width:16px'></a>&nbsp;</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
</div>
</body>
</html>";

    function mailTo($to,$sub,$content) {
        
        global $pre;
        global $pos;

        $mail = new PHPMailer();                          
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        
        $mail->SMTPDebug  = false;  
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "geohorizon22@gmail.com";
        $mail->Password   = "sge_gh22";
       
        $mail->IsHTML(true);
        $mail->CharSet = "UTF-8";
        $mail->addAddress($to); 
        $mail->SetFrom("geohorizon22@gmail.com", "SGE Admin");
        $mail->Subject = $sub;

        $mail->msgHTML($pre.$content.$pos);

        if (!$mail->send()) {
            var_dump($mail);
            return false;
        }else{
            return true;
        }
    }
?>