class UndergroundSystem {
    private $checkIns;
    private $journeys;

    function __construct() {
        $this->checkIns = [];
        $this->journeys = [];
    }

    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkIn($id, $stationName, $t) {
        $this->checkIns[$id] = [$stationName, $t];
    }

    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkOut($id, $stationName, $t) {
        list($startStation, $startTime) = $this->checkIns[$id];
        $duration = $t - $startTime;
        
        if (!isset($this->journeys[$startStation][$stationName])) {
            $this->journeys[$startStation][$stationName] = [$duration, 1];
        } else {
            $this->journeys[$startStation][$stationName][0] += $duration;
            $this->journeys[$startStation][$stationName][1]++;
        }
        
        unset($this->checkIns[$id]);
    }

    /**
     * @param String $startStation
     * @param String $endStation
     * @return Float
     */
    function getAverageTime($startStation, $endStation) {
        list($totalDuration, $count) = $this->journeys[$startStation][$endStation];
        return $totalDuration / $count;
    }
}
