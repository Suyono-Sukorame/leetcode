class StreamChecker {
    private $trie;
    private $queryBuffer;
    private $maxLength;
    
    /**
     * @param String[] $words
     */
    function __construct($words) {
        $this->trie = [];
        $this->queryBuffer = '';
        $this->maxLength = 0;
        
        foreach ($words as $word) {
            $this->maxLength = max($this->maxLength, strlen($word));
            $this->addWordToTrie(strrev($word));
        }
    }
  
    /**
     * @param String $letter
     * @return Boolean
     */
    function query($letter) {
        $this->queryBuffer = $letter . $this->queryBuffer;
        if (strlen($this->queryBuffer) > $this->maxLength) {
            $this->queryBuffer = substr($this->queryBuffer, 0, $this->maxLength);
        }
        
        $currentNode = $this->trie;
        foreach (str_split($this->queryBuffer) as $char) {
            if (!isset($currentNode[$char])) {
                return false;
            }
            $currentNode = $currentNode[$char];
            if ($currentNode['end']) {
                return true;
            }
        }
        
        return false;
    }
    
    private function addWordToTrie($word) {
        $currentNode = &$this->trie;
        foreach (str_split($word) as $char) {
            if (!isset($currentNode[$char])) {
                $currentNode[$char] = [];
            }
            $currentNode = &$currentNode[$char];
        }
        $currentNode['end'] = true;
    }
}