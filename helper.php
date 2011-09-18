<?php
/**
 * Helper class for Rotten Tomatoes review module
 * 
 * @package RottenTomatoes Review Module
 * @link http://www.straw-dogs.co.uk
 * @license BSD License, see LICENSE.php
 */
class modRottenTomatoesReviews
{
    public static function getReviews($url, $apikey)
    {
        $endpoint = $url.'?apikey='.$apikey;

        $session = curl_init($endpoint);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($session);
        curl_close($session);

        $search_results = json_decode($data);
        if ($search_results === NULL){
            echo 'No reviews found';
        }
        return $search_results->reviews;
    }

    public static function getFilm($q, $apikey)
    {
        $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $apikey . '&q=' . $q.'&page_limit=1';
        $session = curl_init($endpoint);

        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($session);
        curl_close($session);

        $search_results = json_decode($data);
        if ($search_results === NULL){
            echo 'No reviews found';
        }
        return $search_results->movies[0];
    }

    public static function curlRequest()
    {

    }
}
?>
