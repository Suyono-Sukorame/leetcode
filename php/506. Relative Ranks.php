class Solution {

/**
 * @param Integer[] $score
 * @return String[]
 */
function findRelativeRanks($score) {
    $ranks = $score;
    rsort($ranks);

    return array_map(function($num) use ($ranks) {
        if ($num === $ranks[0]) return 'Gold Medal';
        elseif ($num === $ranks[1]) return 'Silver Medal';
        elseif ($num === $ranks[2]) return 'Bronze Medal';
        else return strval(array_search($num, $ranks) + 1);
    }, $score);
}
}
