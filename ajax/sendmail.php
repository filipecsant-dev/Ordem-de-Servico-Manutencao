<?php

	require_once('src/PHPMailer.php');
	require_once('src/SMTP.php');
	require_once('src/Exception.php');
		
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

function sendmail($maquina,$data1,$motivo){
	$mail = new PHPMailer(true);

	try {

		$mail->isSMTP();
		$mail->Host = 'smtp.umbler.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'no-reply@nestweb.com.br';
		$mail->Password = 'nest#noreply';
		$mail->Port = 587;

		$mail->setFrom('no-reply@nestweb.com.br');
		$mail->addAddress('manutencao@norpack.com.br');

		$mail->isHTML(true);
		$mail->Subject = 'Preventiva da '.$maquina;
		$mail->Body = utf8_decode('<h3>Agendamento de Preventiva</h3><br />Nova solicitação de agendamento para preventiva da <strong>'.$maquina.'</strong> para a data: <strong>'.$data1.'</strong>.<br /><br /><strong>Motivo:</strong> '.$motivo.'.<br /><br /><strong>Aguardando aprovação.</strong>');
		$mail->AltBody = utf8_decode('<h3>Agendamento de Preventiva</h3><br />Nova solicitação de agendamento para preventiva da <strong>'.$maquina.'</strong> para a data: <strong>'.$data1.'</strong>.<br /><br /><strong>Motivo:</strong> '.$motivo.'.<br /><br /><strong>Aguardando aprovação.</strong>');

		if($mail->send()) {
			echo 'Email enviado com sucesso';
		} else {
			echo 'Email nao enviado';
		}
	} catch (Exception $e) {
		echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
	}
}