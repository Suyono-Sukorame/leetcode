class Node {
    public $next;
    public $data;
    
    function __construct($val = 0) {
        $this->data = $val;
        $this->next = null;
    }
}

class MyLinkedList {
    public $start;

    function __construct() {
        $this->start = null;
    }

    function get($index) {
        $count = 0;
        for ($ptr = $this->start; $ptr !== null; $ptr = $ptr->next) {
            if ($index == $count)
                return $ptr->data;
            $count++;
        }
        return -1;
    }

    function addAtHead($val) {
        $fresh = new Node($val);
        $fresh->next = $this->start;
        $this->start = $fresh;
    }

    function addAtTail($val) {
        if ($this->start == null) {
            $fresh = new Node($val);
            $this->start = $fresh;
        } else {
            for ($ptr = $this->start; $ptr->next !== null; $ptr = $ptr->next);
            $fresh = new Node($val);
            $ptr->next = $fresh;
        }
    }

    function addAtIndex($index, $val) {
        $count = $this->count($this->start);
        if ($index == 0) {
            $this->addAtHead($val);
        } else if ($index == $count) {
            $this->addAtTail($val);
        } else {
            $j = 0;
            for ($ptr = $this->start; $ptr !== null; $ptr = $ptr->next, $j++) {
                if ($j == $index - 1) {
                    $fresh = new Node($val);
                    $fresh->next = $ptr->next;
                    $ptr->next = $fresh;
                    break;
                }
            }
        }
    }

    function deleteAtIndex($index) {
        if ($index == 0) {
            $this->start = $this->start->next;
        }
        $count = $this->count($this->start);
        if ($index > 0 && $index < $count) {
            $j = 0;
            for ($ptr = $this->start; $ptr !== null; $ptr = $ptr->next, $j++) {
                if ($j == $index - 1) {
                    $ptr->next = $ptr->next->next;
                    break;
                }
            }
        }
    }

    function count($head) {
        $count = 0;
        for ($ptr = $head; $ptr !== null; $ptr = $ptr->next) {
            $count++;
        }
        return $count;
    }
}
