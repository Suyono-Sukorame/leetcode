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

    private $maxFreq;
    private $currentFreq;
    private $modes;
    private $prevVal;

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function findMode($root) {
        $this->maxFreq = 0;
        $this->currentFreq = 0;
        $this->modes = [];
        $this->prevVal = null;

        $this->inOrderTraversal($root);

        return $this->modes;
    }

    private function inOrderTraversal($node) {
        if ($node == null) return;

        $this->inOrderTraversal($node->left);

        if ($this->prevVal != null && $this->prevVal == $node->val) {
            $this->currentFreq++;
        } else {
            $this->currentFreq = 1;
        }

        if ($this->currentFreq > $this->maxFreq) {
            $this->maxFreq = $this->currentFreq;
            $this->modes = [$node->val];
        } elseif ($this->currentFreq == $this->maxFreq) {
            $this->modes[] = $node->val;
        }

        $this->prevVal = $node->val;

        $this->inOrderTraversal($node->right);
    }
}
