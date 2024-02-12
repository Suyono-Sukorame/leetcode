/**
 * // This is the interface that allows for creating nested lists.
 * // You should not implement it, or speculate about its implementation
 * class NestedInteger {
 *
 *     // if value is not specified, initializes an empty list.
 *     // Otherwise initializes a single integer equal to value.
 *     function __construct($value = null);
 *
 *     // Return true if this NestedInteger holds a single integer, rather than a nested list.
 *     function isInteger() : bool;
 *
 *     // Return the single integer that this NestedInteger holds, if it holds a single integer
 *     // The result is undefined if this NestedInteger holds a nested list
 *     function getInteger();
 *
 *     // Set this NestedInteger to hold a single integer.
 *     function setInteger($i) : void;
 *
 *     // Set this NestedInteger to hold a nested list and adds a nested integer to it.
 *     function add($ni) : void;
 *
 *     // Return the nested list that this NestedInteger holds, if it holds a nested list
 *     // The result is undefined if this NestedInteger holds a single integer
 *     function getList() : array;
 * }
 */
class Solution {
    /**
     * @param String $s
     * @return NestedInteger
     */
    function deserialize($s) {
        $stack = new SplStack();
        $num = null;
        $isNegative = false;
        
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            
            if ($char === '[') {
                $stack->push(new NestedInteger());
            } elseif ($char === ']' || $char === ',') {
                if (!is_null($num)) {
                    $stack->top()->add(new NestedInteger($isNegative ? -$num : $num));
                    $num = null;
                    $isNegative = false;
                }
                
                if ($char === ']' && $stack->count() > 1) {
                    $nestedInteger = $stack->pop();
                    $stack->top()->add($nestedInteger);
                }
            } elseif ($char === '-') {
                $isNegative = true;
            } else {
                if (is_null($num)) {
                    $num = 0;
                }
                $num = $num * 10 + intval($char);
            }
        }
        
        return $stack->isEmpty() ? new NestedInteger($isNegative ? -$num : $num) : $stack->top();
    }
}
