<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-21 20:25:50
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-12-08 11:24:20
 */

use Symfony\Component\HttpFoundation\Request;

$ajax = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Send contact e-mail  ----------*/
	$ajax->post('/ajaxValidation/contact', function(Request $r) use($app)
	{
		$app['log.contact']->addInfo('Contact email - preparation');

		/*==================================
		=            Build vars            =
		==================================*/
		
			$firstName = ucfirst($r->get('firstName'));
			$lastName = strtoupper($r->get('lastName'));
			$email = $r->get('email');
		    $sections = implode(', ', $r->get('section'));
			$message = $r->get('message');
			$date = date('d/m/Y - H:i');

			$app['log.contact']->addInfo('Contact email info', array
				(
					'email' => $email,
					'lastName' => $lastName,
					'firstName' => $firstName,
				));
		
		/*=====  End of Create vars  =====*/
		
		/*===========================================
		=            Build email content            =
		===========================================*/
		
			$mailContent = 
			"<div style='text-align:center'>
				<h1>
					Demande d'informations
				</h1>
				<h2>
					Mail automatic - formularie de contact
				</h2>
				Demande de la part de $lastName $firstName, le $date.
				<br />
				Répondre à : $email
				<br />
				Sections concernées : $sections.
				<div style='width: 70%; margin-left:15%'>
					<hr />
					<h3>
						Message
					</h3>
					$message
				</div>
			</div>";
		
		/*=====  End of Build email content  ======*/
		
		$mail = $app['Mailer']();

		$mail->isHtml(true);	
	    $mail->CharSet = 'UTF-8';

	    $mail->AddReplyTo($email, "$lastName $firstName");

	    $mail->Subject = "Formularie de contact";		    
		$mail->Body = $mailContent;

		if($app['debug'])
			$mail->addAddress("mathieu.viales@gmail.com");
		else
			$mail->addAddress("sectionrando.frponteillanyls@gmail.com");

	    if($mail->send()) 
	    {
			$app['log.contact']->addInfo('Contact email - success');
			return $app['twig']->render('/sections/_shared/contactSuccess.twig');	 
	    }

		$app['log.contact']->addInfo('Contact email - fail');
	    return 'Message could not be sent.' + 'Mailer Error: ' . $mail->ErrorInfo;
	    
	})->bind('ajax_contact');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('ajax', $ajax);