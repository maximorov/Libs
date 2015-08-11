<?php

/**
 * Class FlightStats_Conf
 */
class FlightStats_Conf
{
    /**
     * @var string
     */
    private static $url = 'https://api.flightstats.com/';
    /**
     * @var string
     */
    private static $app_id = '';
    /**
     * @var string
     */
    private static $app_key = '';

    /**
     * @var array
     */
    private static $available_airports = [
        'KBP' => 'Аэропорт Борисполь',
    ];

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public static function get($name)
    {
        if (isset(self::$$name)) {
            return self::$$name;
        }

        throw new Exception('No variable in config');
    }
}
