class CBTInserter {
    private $root;
    private $nodeCnt;

    function __construct($root) {
        $this->root = $root;
        $this->nodeCnt = $this->count($root);
    }

    function count($root) {
        if ($root === null) return 0;
        if ($root->left === null) $root->right = null;
        return 1 + $this->count($root->left) + $this->count($root->right);
    }

    function insert($val) {
        $nextPos = $this->nodeCnt + 1;
        $level = (int) log($nextPos, 2);
        $levelCnt = pow(2, $level);
        $levelIdx = $nextPos - $levelCnt;

        $cur = $this->root;
        $curIdx = 0;

        for ($i = 0; $i < $level - 1; ++$i) {
            if ($levelIdx < $levelCnt / 2) {
                $cur = $cur->left;
                $curIdx *= 2;
            } else {
                $cur = $cur->right;
                $curIdx = $curIdx * 2 + 1;
                $levelIdx -= ($levelCnt / 2);
            }
            $levelCnt /= 2;
        }

        if ($cur === null) return 0;
        $newNode = new TreeNode($val);
        if ($levelIdx < $levelCnt / 2) {
            $cur->left = $newNode;
        } else {
            $cur->right = $newNode;
        }
        ++$this->nodeCnt;
        return $cur->val;
    }

    function get_root() {
        return $this->root;
    }
}
