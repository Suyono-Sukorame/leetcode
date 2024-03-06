class Solution {

/**
 * @param Integer[] $cells
 * @param Integer $n
 * @return Integer[]
 */
function prisonAfterNDays($cells, $n) {
    $seen = [];
    $is_fast_forwarded = false;

    while ($n > 0) {
        if (!$is_fast_forwarded) {
            $key = implode('', $cells);
            if (isset($seen[$key])) {
                $n %= $seen[$key] - $n;
                $is_fast_forwarded = true;
            } else {
                $seen[$key] = $n;
            }
        }
        
        if ($n > 0) {
            $n--;
            $next_day_cells = $this->nextDay($cells);
            $cells = $next_day_cells;
        }
    }

    return $cells;
}

function nextDay($cells) {
    $result = [];
    for ($i = 0; $i < count($cells); $i++) {
        if ($i == 0 || $i == count($cells) - 1) {
            $result[$i] = 0;
        } else {
            $result[$i] = ($cells[$i - 1] == $cells[$i + 1]) ? 1 : 0;
        }
    }
    return $result;
}
}
