class WordFilter {
    /**
     * @param String[] $words
     */
    function __construct($words) {
        $this->dict = [];
        for ($i = 0; $i < count($words); $i++) {
            $w = $words[$i];
            for ($j = 1; $j <= strlen($w); $j++) {
                $prefix = substr($w, 0, $j);
                for ($k = 0; $k < strlen($w); $k++) {
                    $suffix = substr($w, $k);
                    $this->dict["$prefix-$suffix"] = $i;
                }
            }
        }
    }
  
    /**
     * @param String $pref
     * @param String $suff
     * @return Integer
     */
    function f($pref, $suff) {
        return isset($this->dict["$pref-$suff"]) ? $this->dict["$pref-$suff"] : -1;
    }
}

/**
 * Your WordFilter object will be instantiated and called as such:
 * $obj = WordFilter($words);
 * $ret_1 = $obj->f($pref, $suff);
 */
