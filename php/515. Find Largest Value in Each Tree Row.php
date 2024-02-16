/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function largestValues($root) {
        if ($root === null) return [];

        $result = [];
        $queue = [$root];

        while (!empty($queue)) {
            $levelMax = PHP_INT_MIN;
            $size = count($queue);

            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);
                $levelMax = max($levelMax, $node->val);

                if ($node->left) array_push($queue, $node->left);
                if ($node->right) array_push($queue, $node->right);
            }

            $result[] = $levelMax;
        }

        return $result;
    }
}
