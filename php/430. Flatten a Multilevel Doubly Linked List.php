/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $prev = null;
 *     public $next = null;
 *     public $child = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->prev = null;
 *         $this->next = null;
 *         $this->child = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $head
     * @return Node
     */
    function flatten($head) {
        if ($head === null) return null;
        
        $pseudoHead = new Node(0);
        $pseudoHead->next = $head;
        $prev = $pseudoHead;
        
        $stack = [];
        array_push($stack, $head);
        
        while (!empty($stack)) {
            $current = array_pop($stack);
            
            if ($current->next !== null) {
                array_push($stack, $current->next);
            }
            if ($current->child !== null) {
                array_push($stack, $current->child);
                $current->child = null;
            }
            
            $prev->next = $current;
            $current->prev = $prev;
            $prev = $current;
        }
        
        $pseudoHead->next->prev = null;
        
        return $pseudoHead->next;
    }
}
