class Solution {

/**
 * @param String $S
 * @return String[]
 */
function ambiguousCoordinates($S) {
    $result = [];

    if ($S == null || strlen($S) < 3)
        return $result;

    $value = substr($S, 1, strlen($S) - 2);
    
    for ($i = 1; $i < strlen($value); $i++) {
        $right = $this->values(substr($value, 0, $i));
        $left = $this->values(substr($value, $i));
        
        if (count($right) == 0 || count($left) == 0)
            continue;
        
        foreach ($right as $r) {
            foreach ($left as $l) {
                $result[] = "(" . $r . ", " . $l . ")";
            }
        }
    }
    
    return $result;
}

function values($s) {        
    $result = [];

    $first = $s[0];
    $last = $s[strlen($s) - 1];
    
    if (strlen($s) == 1) {
        $result[] = $s;
        
    } else if ($first == '0' && !($last == '0')) {        
        $result[] = "0." . substr($s, 1);
        
    } else if (!($first == '0') && $last == '0') {
        $result[] = $s;
        
    } else if (!($first == '0' && $last == '0')) {
        $result[] = $s;
        
        for ($i = 1; $i < strlen($s); $i++) {
            $result[] = substr($s, 0, $i) . "." . substr($s, $i);
        }
    }

    return $result;
}
}
