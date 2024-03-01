class Solution {

function minRefuelStops($target, $startFuel, $stations) {
    $maxheap = new SplMaxHeap();
    
    $currFuel = $startFuel;
    $res = 0;
    $currPos = 0;
    $n = count($stations);
    
    while ($currFuel < $target) {
        while ($currPos < $n && $stations[$currPos][0] <= $currFuel) {
            $maxheap->insert($stations[$currPos][1]);
            $currPos++;
        }
        
        if ($maxheap->isEmpty()) {
            return -1;
        }
        
        $currFuel += $maxheap->extract();
        $res++;
    }
    return $res;
}
}
