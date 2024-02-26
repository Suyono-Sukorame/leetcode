class Solution {

/**
 * @param String $bottom
 * @param String[] $allowed
 * @return Boolean
 */
function pyramidTransition($bottom, $allowed) {
    $patterns = [];
    foreach ($allowed as $pattern) {
        $patterns[substr($pattern, 0, 2)][] = substr($pattern, 2, 1);
    }
    
    return $this->canFormPyramid($bottom, $patterns);
}

function canFormPyramid($row, $patterns) {
    if (strlen($row) === 1) {
        return true;
    }
    
    $nextRowPossibilities = [];
    for ($i = 0; $i < strlen($row) - 1; $i++) {
        $pair = substr($row, $i, 2);
        if (!isset($patterns[$pair])) {
            return false;
        }
        $nextRowPossibilities[] = $patterns[$pair];
    }
    
    $nextRows = [];
    $this->generateNextRow([], $nextRowPossibilities, 0, $nextRows);
    
    foreach ($nextRows as $nextRow) {
        if ($this->canFormPyramid($nextRow, $patterns)) {
            return true;
        }
    }
    
    return false;
}

function generateNextRow($currentRow, $possibilities, $index, &$result) {
    if ($index === count($possibilities)) {
        $result[] = implode("", $currentRow);
        return;
    }
    
    foreach ($possibilities[$index] as $block) {
        $currentRow[] = $block;
        $this->generateNextRow($currentRow, $possibilities, $index + 1, $result);
        array_pop($currentRow);
    }
}
}
