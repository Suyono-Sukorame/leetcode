class TrieNode {
    public $word;
    public $children;
    
    function __construct() {
        $this->word = null;
        $this->children = [];
    }
}

class Solution {
    public $root;
    public $result = '';
    
    function longestWord($words) {
        $this->root = new TrieNode();
        if ($words == null) return $this->result;
        foreach ($words as $w) {
            $this->insert($w);
        }
        $this->dfs($this->root);
        
        return $this->result;
    }
    
    private function dfs($node) {
        if ($node == null) return;
        
        if ($node->word !== null) {
            if (strlen($node->word) > strlen($this->result)) {
                $this->result = $node->word;
            } elseif (strlen($node->word) == strlen($this->result) && strcmp($node->word, $this->result) < 0) {
                $this->result = $node->word;
            }
        }
        
        foreach ($node->children as $child) {
            if ($child !== null && $child->word !== null)
                $this->dfs($child);
        }
    }
    
    private function insert($word) {
        $curr = $this->root;
        
        $wordLength = strlen($word);
        for ($i = 0; $i < $wordLength; $i++) {
            $c = $word[$i];
            
            if (!isset($curr->children[$c])) {
                $curr->children[$c] = new TrieNode();
            }
            $curr = $curr->children[$c];
        }
        
        $curr->word = $word;
    }
}
