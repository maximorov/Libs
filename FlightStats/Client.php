<?php

/**
 * Class FlightStats_Client
 */
class FlightStats_Client
{
    const CACHE_KEY = 'fl-st:';
    const CACHE_TTL = 86400;

    public static function getFlights($iataCode, $year, $month, $day, $hour)
    {
        $iataCode = strtoupper($iataCode);

        $url = "flex/schedules/rest/v1/json/from/$iataCode/departing/$year/$month/$day/$hour?" . self::getKeyQuery();

        return self::getResult($url);
    }

    private static function getResult($url)
    {
        $cacher = Mage::app()->getCache();
        $cache_key = self::CACHE_KEY . md5($url);
        $result = $cacher->load($cache_key);
        if ($result) {
            return unserialize($result);
        }

        $json_result = file_get_contents(FlightStats_Conf::get('url') . $url);
        if ($http_response_header !== null &&
            isset($http_response_header[0]) &&
            strpos($http_response_header[0], '200') !== false)
        {
            $result = new FlightStats_Result($json_result);

            $cacher->save(serialize($result), $cache_key, ['flight-stats'], self::CACHE_TTL);

            return $result;
        }

        throw new Exception('Can\'t get response from flights stats server');
    }

    private static function getKeyQuery()
    {
        return http_build_query([
            'appId' => FlightStats_Conf::get('app_id'),
            'appKey' => FlightStats_Conf::get('app_key'),
        ]);
    }
}
