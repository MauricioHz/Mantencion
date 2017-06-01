<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('PHPMailer/class.phpmailer.php');

class Notificar {
    
    const correo_mantencion = 'mantencion.asml@mobagricola.cl';
    const modulo = 'Mantencion ASML';
    const noripley = 'no-reply@mobagricola.cl';
    
    public static function mailNuevaOrdenTrabajo($orden, $tecnico, $supervisor){
        $html = '<p style="color: #056FCC;">Se ha ingresado una nueva orden de trabajo</p>' .
                 '<p>Aprobar o rechazar <a href="www.example.com" target="_blank">#OT' . $orden . '</a></p>'.
                   '<hr style="border: 2px solid #056FCC;">'.
                   '<p style="color: #056FCC;">Modulo Gestión del Mantenimiento ASML</p>';
                   
        $mail = new PHPMailer();
		$mail->SetLanguage('es');
		$mail->SetFrom(Notificar::correo_mantencion, Notificar::modulo);
		$mail->From = Notificar::noripley;
		$mail->Subject = "Nueva Orden de Trabajo #" . $orden;
		$mail->AddAddress($tecnico);
		$mail->AddAddress($supervisor);
		$mail->Body = $html;
		$mail->IsHTML(true);
		if(!$mail->Send()) {
			return $mail->ErrorInfo;
		} else {
			return TRUE;
		}
    }
    
    public static function mailInicioSession($usuario, $date){
        $html = '<p style="color: #056FCC;">El usuario '.$usuario. ' ha iniciado sessión ('.$date.')</p>';
                   
        $mail = new PHPMailer();
		$mail->SetLanguage('es');
		$mail->SetFrom(Notificar::correo_mantencion, Notificar::modulo);
		$mail->From = Notificar::noripley;
		$mail->Subject = utf8_decode("Nuevo inicio de sesión APP Mantención ".$date);
		$mail->AddAddress('mauriciohz2002@gmail.com');
		$mail->Body = $html;
		$mail->IsHTML(true);
		if(!$mail->Send()) {
			return $mail->ErrorInfo;
		} else {
			return TRUE;
		}
    }

}
?>