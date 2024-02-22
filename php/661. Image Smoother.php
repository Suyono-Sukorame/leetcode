class Solution {

function imageSmoother($img) {
    $m = count($img);
    $n = count($img[0]);
    $res = [];
    $dirs = [-1, 0, 1];
    
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $sum = $count = 0;
            foreach ($dirs as $dx) {
                foreach ($dirs as $dy) {
                    $x = $i + $dx;
                    $y = $j + $dy;
                    if ($x >= 0 && $x < $m && $y >= 0 && $y < $n) {
                        $sum += $img[$x][$y];
                        $count++;
                    }
                }
            }
            $res[$i][$j] = floor($sum / $count);
        }
    }

    return $res;
}
}
