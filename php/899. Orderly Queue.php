class Solution {

function orderlyQueue($s, $k) {
    if ($k == 1) {
        $minString = $s;
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            $s = substr($s, 1) . $s[0];
            if ($s < $minString) {
                $minString = $s;
            }
        }
        return $minString;
    } else {
        $s_array = str_split($s);
        sort($s_array);
        return implode('', $s_array);
    }
}
}
