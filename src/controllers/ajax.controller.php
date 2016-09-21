<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-21 20:25:50
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-21 20:29:08
 */

use Symfony\Component\HttpFoundation\Request;

$ajax = $app['controllers_factory'];

$ajax->post('/ajaxValidation/contact', function(Request $r) use($app)
{
	$sections = implode(', ', $r->get('section'));
	$txt = "Demande d'informations de la part de  {$r->get('firstName')} {$r->get('lastName')}, adresse email : {$r->get('email')}, \n\rLa demande concerne la ou les sections suivantes ; {$sections} \n\r{$r->get('message')}";

	// $to = "sectionrando.frponteillanyls@gmail.com";
	$to = "mathieu.viales@gmail.com";
	$subject = "Demande d'informations";
	$headers = "From: noreply.foyerponteilla@gmail.com";

	mail($to,$subject,$txt,$headers);


	return $app['twig']->render('/sections/_shared/contactSuccess.partial.html.twig');
})->bind('ajax_contact');

$app->mount('ajax', $ajax);