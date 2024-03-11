class Solution {

function minDominoRotations($tops, $bottoms) {
    $n = count($tops);
    $target = $tops[0];
    $target2 = $bottoms[0];

    $rotations1 = $this->check($tops, $bottoms, $target);
    $rotations2 = $this->check($tops, $bottoms, $target2);

    if ($rotations1 != -1 && $rotations2 != -1) {
        return min($rotations1, $rotations2);
    }

    if ($rotations1 != -1) {
        return $rotations1;
    }

    if ($rotations2 != -1) {
        return $rotations2;
    }

    return -1;
}

function check($tops, $bottoms, $target) {
    $rotationsTop = 0;
    $rotationsBottom = 0;

    for ($i = 0; $i < count($tops); $i++) {
        if ($tops[$i] != $target && $bottoms[$i] != $target) {
            return -1;
        }
        if ($tops[$i] != $target) {
            $rotationsTop++;
        }
        if ($bottoms[$i] != $target) {
            $rotationsBottom++;
        }
    }

    return min($rotationsTop, $rotationsBottom);
}
}
