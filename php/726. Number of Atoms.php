class Solution {

/**
 * @param String $formula
 * @return String
 */
function countOfAtoms($formula) {
    $counts = [];
    
    $parse = function($i, $mult = 1) use (&$formula, &$parse, &$counts) {
        $n = strlen($formula);
        while ($i >= 0 && $formula[$i] != '(') {
            $count = 0;
            $power = 1;
            while (ctype_digit($formula[$i])) {
                $count = ($power * intval($formula[$i])) + $count;
                $i--;
                $power *= 10;
            }
            $count = max($count, 1);
            
            if ($formula[$i] == ')') {
                $i = $parse($i - 1, $count * $mult);
                continue;
            }
            
            $name = [];
            while (ctype_lower($formula[$i])) {
                array_push($name, $formula[$i]);
                $i--;
            }
            array_push($name, $formula[$i]);
            $atom = implode('', array_reverse($name));
            $counts[$atom] += $count * $mult;
            $i--;
        }
        return $i - 1;
    };
    
    $parse(strlen($formula) - 1);
    
    $atoms = [];
    foreach ($counts as $atom => $count) {
        $atoms[] = $atom . ($count > 1 ? $count : '');
    }
    sort($atoms);
    
    return implode('', $atoms);
}
}
