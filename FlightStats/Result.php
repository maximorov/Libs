<?php

/**
 * Class FlightStats_Result
 */
class FlightStats_Result
{
    /**
     * @var array|mixed
     */
    private $data = [];

    /**
     * @param $json_result
     */
    public function __construct($json_result)
    {
        $this->data = json_decode($json_result, true);
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->data['request'];
    }

    /**
     * @return mixed
     */
    public function getScheduledFlights()
    {
        return $this->data['scheduledFlights'];
    }

    /**
     * @return mixed
     */
    public function getAppendix()
    {
        return $this->data['appendix'];
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->data['error'];
    }
}

