class Solution {

function buddyStrings($s, $goal) {
    if (strlen($s) != strlen($goal)) {
        return false;
    }
    
    if ($s == $goal) {
        $charCount = array_count_values(str_split($s));
        foreach ($charCount as $count) {
            if ($count >= 2) {
                return true;
            }
        }
        return false;
    }
    
    $diff = [];
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {
        if ($s[$i] != $goal[$i]) {
            $diff[] = $i;
        }
    }
    
    if (count($diff) != 2) {
        return false;
    }
    
    $swap1 = $diff[0];
    $swap2 = $diff[1];
    if ($s[$swap1] == $goal[$swap2] && $s[$swap2] == $goal[$swap1]) {
        return true;
    }
    
    return false;
}
}
