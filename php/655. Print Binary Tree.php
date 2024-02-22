class Solution {

public function printTree($root) {
    $height = $this->getHeight($root);
    $m = $height;
    $n = (1 << $height) - 1;
    $matrix = array_fill(0, $m, array_fill(0, $n, ""));
    $this->fillMatrix($root, $matrix, 0, 0, $n - 1);
    return $matrix;
}

public function getHeight($root) {
    return $root ? 1 + max($this->getHeight($root->left), $this->getHeight($root->right)) : 0;
}

public function fillMatrix($node, &$matrix, $row, $left, $right) {
    if ($node === null) {
        return;
    }
    $col = ($left + $right) / 2;
    $matrix[$row][$col] = strval($node->val);
    $this->fillMatrix($node->left, $matrix, $row + 1, $left, $col - 1);
    $this->fillMatrix($node->right, $matrix, $row + 1, $col + 1, $right);
}
}
