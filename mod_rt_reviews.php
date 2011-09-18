<?php
/**
 * Rotten Tomatoes Reviews module entry point.
 * 
 * @package RottenTomatoes Review Module
 * @link http://www.straw-dogs.co.uk
 * @license BSD License, see LICENSE.php
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
$option = JRequest::getCmd('option');
$view = JRequest::getCmd('view');

if(($option == 'com_content' && ($view == 'section' || $view == 'category')) || $view == 'itemlist'){
    echo 'No reviews for here';
}else{
    require_once( dirname(__FILE__).DS.'helper.php' );
    require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
    $apikey = $params->get('apikey');
    $filmoverride = $params->get('film');

    if(strlen($filmoverride) > 0){
        $q = urlencode($filmoverride);
    }else{
        global $mainframe;
        $pagetitle = $mainframe->GetPageTitle();
        $q = urlencode(substr($pagetitle, strpos($pagetitle, "-")+2));
    }

    $rtr = new modRottenTomatoesReviews($apikey);

    $movie = $rtr->getFilm($q);
    $reviews = $rtr->getReviews($movie->links->reviews);

    require(JModuleHelper::getLayoutPath('mod_rt_reviews'));
}
?>

