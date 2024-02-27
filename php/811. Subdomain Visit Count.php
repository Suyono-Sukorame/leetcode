class Solution {

/**
 * @param String[] $cpdomains
 * @return String[]
 */
function subdomainVisits($cpdomains) {
    $map = [];
    foreach ($cpdomains as $str) {
        $sp = explode(" ", $str);
        $count = intval($sp[0]);
        $fsp = explode(".", $sp[1]);
        $map[$sp[1]] = ($map[$sp[1]] ?? 0) + $count;
        if (count($fsp) == 2) {
            $map[$fsp[1]] = ($map[$fsp[1]] ?? 0) + $count;
        } else {
            $s = $fsp[1] . "." . $fsp[2];
            $map[$s] = ($map[$s] ?? 0) + $count;
            $map[$fsp[2]] = ($map[$fsp[2]] ?? 0) + $count;
        }
    }
    $res = [];
    foreach ($map as $domain => $count) {
        $res[] = $count . " " . $domain;
    }
    return $res;
}
}