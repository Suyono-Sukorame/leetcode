class Solution {

/**
 * @param Integer $candies
 * @param Integer $num_people
 * @return Integer[]
 */
function distributeCandies($candies, $num_people) {
    $result = array_fill(0, $num_people, 0);
    
    $candyToGive = 1;
    $index = 0;
    
    while ($candies > 0) {
        $result[$index % $num_people] += min($candies, $candyToGive);
        $candies -= $candyToGive;
        $candyToGive++;
        $index++;
    }
    
    return $result;
}
}
