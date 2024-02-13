class TrieNode {
    public $zero;
    public $one;
    
    function __construct() {
        $this->zero = null;
        $this->one = null;
    }
    
    public function isLeaf() {
        return $this->zero === null && $this->one === null;
    }
}

class Trie {
    public $root;
    public $maxDigits;
    
    function __construct($maxNum) {
        $this->root = new TrieNode();
        $this->maxDigits = strlen(decbin($maxNum));
    }
    
    public function insert($num) {
        $currentNode = $this->root;
        
        for ($i = $this->maxDigits; $i > 0; $i--) {
            if (($num & (1 << ($i-1))) == 0) {
                if ($currentNode->zero === null) {
                    $currentNode->zero = new TrieNode();
                }
                $currentNode = $currentNode->zero;
            } else {
                if ($currentNode->one === null) {
                    $currentNode->one = new TrieNode();
                }
                $currentNode = $currentNode->one;
            }
        }
    }
    
    public function getMax() {
        return $this->getMaxRec($this->root, $this->root, 0);
    }
    
    public function getMaxRec($n1, $n2, $startingValue) {
        if ($n1 === null || $n2 === null) {
            return 0;
        }
        
        if ($n1->isLeaf() && $n2->isLeaf()) {
            return $startingValue;
        }
        
        $newVal = $startingValue << 1;
        $val1 = $this->getMaxRec($n1->one, $n2->zero, $newVal + 1);
        $val2 = $this->getMaxRec($n1->zero, $n2->one, $newVal + 1);
        $best = max($val1, $val2);
        
        if ($best > 0) {
            return $best;
        } else {
            $val1 = $this->getMaxRec($n1->one, $n2->one, $newVal + 0);
            $val2 = $this->getMaxRec($n1->zero, $n2->zero, $newVal + 0);
            return max($val1, $val2);
        }
    }
}

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaximumXOR($nums) {
        if (count($nums) <= 1) {
            return 0;
        }
        
        $maxNum = max($nums);
        $trie = new Trie($maxNum);
        
        foreach ($nums as $num) {
            $trie->insert($num);
        }
        
        return $trie->getMax();
    }
}

$solution = new Solution();
echo $solution->findMaximumXOR([3,10,5,25,2,8]) . "\n"; // Output: 28
echo $solution->findMaximumXOR([14,70,53,83,49,91,36,80,92,51,66,70]) . "\n"; // Output: 127
