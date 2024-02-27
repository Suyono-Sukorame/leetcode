class Solution {

/**
 * @param Integer[][] $routes
 * @param Integer $source
 * @param Integer $target
 * @return Integer
 */
function numBusesToDestination($routes, $source, $target) {
    if ($source == $target) return 0;

    $routesMap = [];
    foreach ($routes as $i => $route) {
        foreach ($route as $stop) {
            if (!isset($routesMap[$stop])) $routesMap[$stop] = [];
            $routesMap[$stop][] = $i; 
        }
    }

    $visited = array_fill(0, count($routes), false);
    $queue = new SplQueue(); 
    $queue->enqueue([$source, 0]); 

    while (!$queue->isEmpty()) {
        [$currentStop, $numBuses] = $queue->dequeue();

        foreach ($routesMap[$currentStop] as $bus) {
            if ($visited[$bus]) continue; 
            $visited[$bus] = true; 
            foreach ($routes[$bus] as $nextStop) {
                if ($nextStop == $target) return $numBuses + 1; 
                $queue->enqueue([$nextStop, $numBuses + 1]); 
            }
        }
    }

    return -1; 
}
}
