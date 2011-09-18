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
    private $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function getReviews($url)
    {
        $endpoint = $url.'?apikey='.$this->apikey;
        
        $results = $this->curlRequest($endpoint);
        if($results === NULL){
            echo 'No reviews found';
            return false;
        }
        return $results->reviews;
    }

    public function getFilm($q)
    {
        $endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $this->apikey . '&q=' . $q.'&page_limit=1';
        $result = $this->curlRequest($endpoint);
        
        if($result === NULL){
            echo 'Film not found';
            return false;
        }
        return $result->movies[0];
    }

    public function curlRequest($url)
    {
        $session = curl_init($url);

        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($session);
        curl_close($session);

        return json_decode($data);
    }
}
?>
