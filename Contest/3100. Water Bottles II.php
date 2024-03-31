class Solution {
    /**
     * @param Integer $numBottles
     * @param Integer $numExchange
     * @return Integer
     */
    function maxBottlesDrunk($numBottles, $numExchange) {
        $drank_max_bottles = 0;
        $full_bottles = $numBottles;
        $empty_bottles = 0;
        
        while ($full_bottles) {
            $drank_max_bottles += $full_bottles;
            $empty_bottles += $full_bottles;
            $full_bottles = 0;
            
            while ($empty_bottles >= $numExchange) {
                $empty_bottles -= $numExchange;
                $numExchange++;
                $full_bottles++;
            }
        }
        
        return $drank_max_bottles;
    }
}
