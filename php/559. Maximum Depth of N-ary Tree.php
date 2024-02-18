/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer
     */
    function maxDepth($root) {
        return $this->dfs($root, 1);
    }
    
    function dfs($node, $level) {
        if (!$node) return $level - 1;
        
        $max = $level;
        
        foreach ($node->children as $child) {
            $childDepth = $this->dfs($child, $level + 1);
            $max = max($max, $childDepth);
        }
        return $max;
    }
}
