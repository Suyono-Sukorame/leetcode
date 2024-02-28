class Solution {

/**
 * @param String[] $strs
 * @return Integer
 */
function numSimilarGroups($strs) {
    $n = count($strs);
    $uf = new UnionFind($n);
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($this->isSimilar($strs[$i], $strs[$j])) {
                $uf->union($i, $j);
            }
        }
    }
    
    $groups = [];
    for ($i = 0; $i < $n; $i++) {
        $groups[$uf->find($i)] = true;
    }
    
    return count($groups);
}

function isSimilar($word1, $word2) {
    $diffCount = 0;
    $n = strlen($word1);
    for ($i = 0; $i < $n; $i++) {
        if ($word1[$i] != $word2[$i]) {
            $diffCount++;
            if ($diffCount > 2) return false;
        }
    }
    return true;
}
}

class UnionFind {
private $parent;

function __construct($n) {
    $this->parent = range(0, $n - 1);
}

function find($x) {
    if ($this->parent[$x] != $x) {
        $this->parent[$x] = $this->find($this->parent[$x]);
    }
    return $this->parent[$x];
}

function union($x, $y) {
    $rootX = $this->find($x);
    $rootY = $this->find($y);
    if ($rootX != $rootY) {
        $this->parent[$rootX] = $rootY;
    }
}
}
