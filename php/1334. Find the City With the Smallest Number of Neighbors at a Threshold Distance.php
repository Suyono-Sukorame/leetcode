class Solution {

function findTheCity($n, $edges, $distanceThreshold) {
    $graph = array_fill(0, $n, array_fill(0, $n, PHP_INT_MAX));
    
    foreach ($edges as $edge) {
        list($from, $to, $weight) = $edge;
        $graph[$from][$to] = $weight;
        $graph[$to][$from] = $weight;
    }
    
    for ($i = 0; $i < $n; $i++) {
        $graph[$i][$i] = 0;
    }
    
    for ($k = 0; $k < $n; $k++) {
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $graph[$i][$j] = min($graph[$i][$j], $graph[$i][$k] + $graph[$k][$j]);
            }
        }
    }
    
    $minCities = PHP_INT_MAX;
    $city = -1;
    
    for ($i = 0; $i < $n; $i++) {
        $reachableCities = 0;
        for ($j = 0; $j < $n; $j++) {
            if ($graph[$i][$j] <= $distanceThreshold) {
                $reachableCities++;
            }
        }
        
        if ($reachableCities <= $minCities) {
            $minCities = $reachableCities;
            $city = $i;
        }
    }
    
    return $city;
}
}
