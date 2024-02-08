class Solution {
    function getSkyline($buildings) {

        //add all left and right borders ordered by position asc
        $points = new MinSplPriorityQueue();
        $points->setExtractFlags(3);
        for($i = 0;$i < count($buildings);$i++){
            $curBuilding = $buildings[$i];
            list($l,$r,$h) = $curBuilding;
            $points->insert($i,$l);
            $points->insert($i,$r);
        }
        
        //priority queue for top tracking, use -1*0 as immutable floor element
        $topBuildingPq = new SplPriorityQueue();
        $topBuildingPq->insert(-1,0);
        $topBuildingPq->setExtractFlags(3);
        $results = [];
        
        $curHeight = 0;
        $lastPointHeight = null;
        
        while(!$points->isEmpty()){
            
            $data = $points->extract();
            $pos = $data['priority'];
            $buildingId = $data['data'];
            list($leftPos,$rightPos,$height) = $buildings[$buildingId];
            
            if($pos === $leftPos) {
                $topBuildingPq->insert($rightPos, $height);
            }
            
            $topHeight = $topBuildingPq->top()['priority'];
            $topPos = $topBuildingPq->top()['data'];
            
            while($pos >= $topPos && $topPos > 0) {
                $topBuildingPq->extract();
                $topHeight = $topBuildingPq->top()['priority'];
                $topPos = $topBuildingPq->top()['data'];
            }
            
            if($curHeight != $topHeight){
                if ($results[count($results)-1][1] === $topHeight) {
                } elseif($results[count($results)-1][0] === $pos){
                    $maxHeight = max($topHeight, $results[count($results)-1][1]);
                    $results[count($results)-1][1] = $maxHeight;
                    if(isset($results[count($results)-2]) && $results[count($results)-2][1] === $maxHeight){
                        array_pop($results);
                    }
                } else {
                    $results[] = [$pos, $topHeight];
                }
                $curHeight = $topHeight;
            }
            
        }
        
        return $results;
    }
    
}

class MinSplPriorityQueue extends SplPriorityQueue {
    function compare($a,$b){
        return $b-$a;
    }
}
