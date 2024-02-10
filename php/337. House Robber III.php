class Solution {

/**
 * @param TreeNodeAlias $root
 * @return Integer
 */
function rob($root) {
    $num = $this->dfs($root);
    return max($num[0], $num[1]);
}

function dfs($x) {
    if ($x == null) return [0, 0];
    $left = $this->dfs($x->left);
    $right = $this->dfs($x->right);
    $res = [0, 0];
    $res[0] = $left[1] + $right[1] + $x->val;
    $res[1] = max($left[0], $left[1]) + max($right[0], $right[1]);
    return $res;
}
}
