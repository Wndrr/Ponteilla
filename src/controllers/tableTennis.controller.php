<?php
/**
 * @Author: Wndrr
 * @Date:   2016-09-16 23:12:01
 * @Last Modified by:   Wndrr
 * @Last Modified time: 2016-09-20 12:55:29
 */

use Symfony\Component\HttpFoundation\Request;

$tableTennis = $app['controllers_factory'];

$tableTennis->get('/', function() use($app)
{
    return $app['twig']->render('sections/tableTennis/index.html.twig', array());
})
->bind('tableTennis_index');

$tableTennis->post('/ajaxValidation/contact', function(Request $r) use($app)
{
	$sections = implode(', ', $r->get('section'));
	$txt = "Demande d'informations de la part de  {$r->get('firstName')} {$r->get('lastName')}, adresse email : {$r->get('email')}, \n\rLa demande concerne la ou les sections suivantes ; {$sections} \n\r{$r->get('message')}";

	// $to = "sectionrando.frponteillanyls@gmail.com";
	$to = "mathieu.viales@gmail.com";
	$subject = "Demande d'informations";
	$headers = "From: noreply.foyerponteilla@gmail.com";

	mail($to,$subject,$txt,$headers);


	return $app['twig']->render('/shared/contactSuccess.partial.html.twig');
})->bind('tableTennis_contact');

$app->mount('tableTennis', $tableTennis);