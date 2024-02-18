class Solution {

/**
 * @param Integer[][] $wall
 * @return Integer
 */
function leastBricks($wall) {
    $edge_counts = array();
    foreach ($wall as $row) {
        $edge_pos = 0;
        foreach (array_slice($row, 0, -1) as $brick_width) {
            $edge_pos += $brick_width;
            $edge_counts[$edge_pos] = isset($edge_counts[$edge_pos]) ? $edge_counts[$edge_pos] + 1 : 1;
        }
    }
    return count($wall) - (empty($edge_counts) ? 0 : max($edge_counts));
}
}
