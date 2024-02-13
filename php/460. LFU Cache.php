class ListNodeLFU {
    public $key;
    public $val;
    public $freq;
    public $prev;
    public $next;

    function __construct($key, $val) {
        $this->key = $key;
        $this->val = $val;
        $this->freq = 1;
        $this->prev = null;
        $this->next = null;
    }
}

class DLLLFU {
    public $head;
    public $tail;
    public $size;

    function __construct() {
        $this->head = new ListNodeLFU(0, 0);
        $this->tail = new ListNodeLFU(0, 0);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
        $this->size = 0;
    }

    function insertHead($node) {
        $headNext = $this->head->next;
        $headNext->prev = $node;
        $this->head->next = $node;
        $node->prev = $this->head;
        $node->next = $headNext;
        $this->size++;
    }

    function removeNode($node) {
        $node->next->prev = $node->prev;
        $node->prev->next = $node->next;
        $this->size--;
    }

    function removeTail() {
        $tail = $this->tail->prev;
        $this->removeNode($tail);
        return $tail;
    }
}

class LFUCache {
    private $cache;
    private $freqTable;
    private $capacity;
    private $minFreq;

    function __construct($capacity) {
        $this->cache = [];
        $this->freqTable = [];
        $this->capacity = $capacity;
        $this->minFreq = 0;
    }

    function get($key) {
        if (!isset($this->cache[$key])) {
            return -1;
        }
        return $this->updateCache($this->cache[$key], $key, $this->cache[$key]->val);
    }

    function put($key, $value) {
        if ($this->capacity == 0) {
            return;
        }
        if (isset($this->cache[$key])) {
            $this->updateCache($this->cache[$key], $key, $value);
        } else {
            if (count($this->cache) == $this->capacity) {
                $prevTail = $this->freqTable[$this->minFreq]->removeTail();
                unset($this->cache[$prevTail->key]);
            }
            $node = new ListNodeLFU($key, $value);
            if (!isset($this->freqTable[1])) {
                $this->freqTable[1] = new DLLLFU();
            }
            $this->freqTable[1]->insertHead($node);
            $this->cache[$key] = $node;
            $this->minFreq = 1;
        }
    }

    function updateCache($node, $key, $value) {
        $node = $this->cache[$key];
        $node->val = $value;
        $prevFreq = $node->freq;
        $node->freq++;
        $this->freqTable[$prevFreq]->removeNode($node);
        if (!isset($this->freqTable[$node->freq])) {
            $this->freqTable[$node->freq] = new DLLLFU();
        }
        $this->freqTable[$node->freq]->insertHead($node);
        if ($prevFreq == $this->minFreq && $this->freqTable[$prevFreq]->size == 0) {
            $this->minFreq++;
        }
        return $node->val;
    }
}
