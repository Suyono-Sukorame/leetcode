class Solution {

/**
 * @param String[][] $tickets
 * @return String[]
 */
function findItinerary($tickets) {
    // Initialize an adjacency list to store destinations for each departure airport
    $graph = [];
    
    foreach ($tickets as $ticket) {
        $from = $ticket[0];
        $to = $ticket[1];
        if (!isset($graph[$from])) {
            $graph[$from] = [];
        }
        $graph[$from][] = $to;
    }
    
    foreach ($graph as &$destinations) {
        sort($destinations);
    }
    
    $itinerary = [];
    
    $dfs = function($airport) use (&$dfs, &$graph, &$itinerary) {
        while (isset($graph[$airport]) && count($graph[$airport]) > 0) {
            $nextAirport = array_shift($graph[$airport]);
            $dfs($nextAirport);
        }
        array_unshift($itinerary, $airport);
    };
    
    $dfs('JFK');
    
    return $itinerary;
}
}

$solution = new Solution();
$tickets1 = [["MUC","LHR"],["JFK","MUC"],["SFO","SJC"],["LHR","SFO"]];
print_r($solution->findItinerary($tickets1)); // Output: ["JFK","MUC","LHR","SFO","SJC"]

$tickets2 = [["JFK","SFO"],["JFK","ATL"],["SFO","ATL"],["ATL","JFK"],["ATL","SFO"]];
print_r($solution->findItinerary($tickets2)); // Output: ["JFK","ATL","JFK","SFO","ATL","SFO"]
