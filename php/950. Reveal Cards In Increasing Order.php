class Solution {

function deckRevealedIncreasing($deck) {
    sort($deck);
    $n = count($deck);
    $res = [$deck[$n - 1]];
    array_pop($deck);
    
    while (count($res) != $n) {
        array_unshift($res, array_pop($res));
        array_unshift($res, array_pop($deck));
    }
    
    return $res;
}
}
