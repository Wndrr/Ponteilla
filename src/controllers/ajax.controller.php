<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-21 20:25:50
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-25 16:04:34
 */

use Symfony\Component\HttpFoundation\Request;

$ajax = $app['controllers_factory'];

/*==============================
=            Routes            =
==============================*/

	/*----------  Send contact e-mail  ----------*/
	$ajax->post('/ajaxValidation/contact', function(Request $r) use($app)
	{
		$mail = $app['Mailer']();
		
	    $mail->Subject = "Demande d'informations";
	    $sections = implode(', ', $r->get('section'));
		$mail->Body    = "Demande d'informations de la part de  {$r->get('firstName')} {$r->get('lastName')}, adresse email : {$r->get('email')}, \n\rLa demande concerne la ou les sections suivantes ; {$sections} \n\r{$r->get('message')}";
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->addAddress("sectionrando.frponteillanyls@gmail.com");

		if($app['debug'])
			$mail->addAddress("mathieu.viales@gmail.com");


	    if($mail->send()) 
			return $app['twig']->render('/sections/_shared/contactSuccess.partial.html.twig');
	    
	    else 
	        return 'Message could not be sent.' + 'Mailer Error: ' . $mail->ErrorInfo;
	    
	})->bind('ajax_contact');

/*=====  End of Routes  ======*/

/*----------  Enable controller  ----------*/
$app->mount('ajax', $ajax);