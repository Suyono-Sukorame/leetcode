class TrieNode {
    public $children = [];
    public $isLeaf = false;
    public $wordCount = 0;

    public function __construct() {
        $this->children = array_fill(0, 26, null);
    }

    public function insert($word) {
        $current = $this;
        $length = strlen($word);
        for ($i = 0; $i < $length; $i++) {
            $index = ord($word[$i]) - ord('a');
            if ($current->children[$index] === null) {
                $current->children[$index] = new TrieNode();
            }
            $current = $current->children[$index];
        }
        $current->isLeaf = true;
        $current->wordCount++;
    }

    public function getPrefixLength($word) {
        $current = $this;
        $count = 0;
        $length = strlen($word);
        $prefix = "";
        for ($i = 0; $i < $length; $i++) {
            $index = ord($word[$i]) - ord('a');
            $prefix .= $word[$i];
            if ($current->children[$index] === null) {
                break;
            }
            $current = $current->children[$index];
            if ($current->isLeaf && $this->endsWith($word, $prefix)) {
                $count += $current->wordCount;
            }
        }
        return $count;
    }

    private function endsWith($haystack, $needle) {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return substr($haystack, -$length) === $needle;
    }
}

class Solution {
    public function countPrefixSuffixPairs($words) {
        $trieNode = new TrieNode();
        $result = 0;
        foreach ($words as $word) {
            $result += $trieNode->getPrefixLength($word);
            $trieNode->insert($word);
        }
        return $result;
    }
}
