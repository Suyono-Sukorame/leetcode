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
     * @return integer[][]
     */
    function levelOrder($root) {
        if ($root === null) return [];
        
        $result = [];
        $queue = [$root];
        
        while (!empty($queue)) {
            $levelSize = count($queue);
            $currentLevel = [];
            
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $currentLevel[] = $node->val;
                
                foreach ($node->children as $child) {
                    array_push($queue, $child);
                }
            }
            
            $result[] = $currentLevel;
        }
        
        return $result;
    }
}
