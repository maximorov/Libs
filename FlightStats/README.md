API for FlightStats.com v 0.01 FOR Magento v 1.9.2

Example:
$available_airports = FlightStats_Conf::get('available_airports');

$result = FlightStats_Client::getFlights(current(array_keys($available_airports)), 2015, 8, 11, 12);

print_r($result->getScheduledFlights());
