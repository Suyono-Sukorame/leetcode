class Solution {
    function findReplaceString($S, $indexes, $sources, $targets) {
        if (empty($indexes) || $S === null || empty($S)) return $S;

        $sb = '';
        $sin = 0;
        $li = [];

        for ($i = 0; $i < count($indexes); $i++) {
            $r = new Replace($indexes[$i], $sources[$i], $targets[$i]);
            $li[] = $r;
        }

        usort($li, function($a, $b) {
            return $a->getIndex() - $b->getIndex();
        });

        foreach ($li as $r) {
            $index = $r->getIndex();
            $s = $r->getSource();
            $t = $r->getTarget();

            if ($sin < $index) {
                $sb .= substr($S, $sin, $index - $sin);
                $sin = $index;
            }

            if ($s === substr($S, $sin, strlen($s))) {
                $sb .= $t;
                $sin += strlen($s);
            }
        }

        if ($sin != strlen($S)) {
            $sb .= substr($S, $sin);
        }

        return $sb;
    }
}

class Replace {
    public $index;
    public $source;
    public $target;

    function __construct($index, $source, $target) {
        $this->index = $index;
        $this->source = $source;
        $this->target = $target;
    }

    function getIndex() {
        return $this->index;
    }

    function getSource() {
        return $this->source;
    }

    function getTarget() {
        return $this->target;
    }
}