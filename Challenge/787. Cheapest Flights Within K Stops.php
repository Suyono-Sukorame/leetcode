class Solution {

/**
 * @param Integer $n
 * @param Integer[][] $flights
 * @param Integer $src
 * @param Integer $dst
 * @param Integer $k
 * @return Integer
 */
function findCheapestPrice($n, $flights, $src, $dst, $k) {
    $adj = [];
    foreach ($flights as $flight) {
        if (!isset($adj[$flight[0]])) {
            $adj[$flight[0]] = [];
        }
        $adj[$flight[0]][] = [$flight[1], $flight[2]];
    }

    $dist = array_fill(0, $n, PHP_INT_MAX);
    $dist[$src] = 0;

    $q = new SplQueue();
    $q->enqueue([$src, 0]);
    $stops = 0;

    while (!$q->isEmpty() && $stops <= $k) {
        $sz = $q->count();
        while ($sz-- > 0) {
            [$node, $distance] = $q->dequeue();

            if (isset($adj[$node])) {
                foreach ($adj[$node] as [$neighbour, $price]) {
                    if ($price + $distance < $dist[$neighbour]) {
                        $dist[$neighbour] = $price + $distance;
                        $q->enqueue([$neighbour, $dist[$neighbour]]);
                    }
                }
            }
        }
        $stops++;
    }

    return $dist[$dst] === PHP_INT_MAX ? -1 : $dist[$dst];
}
}
