class Solution {

/**
 * @param String $s
 * @return String
 */
function reorganizeString($s) {
    $length = strlen($s);
    $counter = [];
    
    for ($i = 0; $i < $length; $i++) {
        if (!isset($counter[$s[$i]])) {
            $counter[$s[$i]] = 0;
        }
        $counter[$s[$i]]++;
    }
    
    $pq = new SplPriorityQueue();
    foreach ($counter as $char => $freq) {
        $pq->insert($char, $freq);
    }
    
    $result = '';
    while ($pq->count() > 1) {
        $char1 = $pq->extract();
        $char2 = $pq->extract();
        $result .= $char1 . $char2;
        if (--$counter[$char1] > 0) {
            $pq->insert($char1, $counter[$char1]);
        }
        if (--$counter[$char2] > 0) {
            $pq->insert($char2, $counter[$char2]);
        }
    }
    
    if ($pq->count() > 0) {
        $lastChar = $pq->extract();
        if ($counter[$lastChar] > 1) {
            return '';
        }
        $result .= $lastChar;
    }
    
    return $result;
}
}
