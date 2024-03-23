class Solution {
    public $c2N = [];
    public $n2C = [];
    public $not0 = [];

    /**
     * @param String[] $words
     * @param String $result
     * @return Boolean
     */
    function isSolvable($words, $result) {
        $maxWord = 1;
        foreach ($words as $word) {
            if (strlen($word) > 1) {
                $this->not0[ord($word[0]) - ord('A')] = true;
            }
            $maxWord = max($maxWord, strlen($word));
            if (strlen($word) > strlen($result)) {
                return false;
            }
        }
        if ($maxWord + 1 < strlen($result)) {
            return false;
        }
        if (strlen($result) > 1) {
            $this->not0[ord($result[0]) - ord('A')] = true;
        }
        $this->c2N = array_fill(0, 26, -1);
        $this->n2C = array_fill(0, 10, -1);
        return $this->dfs($words, $result, 0, 0, 0);
    }

    function dfs($words, $result, $wordIdx, $pos, $x) {
        if ($pos == strlen($result)) {
            return $x == 0;
        }
        if ($wordIdx == count($words)) {
            $sum = $x;
            foreach ($words as $word) {
                if (strlen($word) > $pos) {
                    $sum += $this->c2N[ord($word[strlen($word) - 1 - $pos]) - ord('A')];
                }
            }
            $num = $sum % 10;
            $c = $result[strlen($result) - 1 - $pos];
            if ($this->c2N[ord($c) - ord('A')] != -1) {
                if ($this->c2N[ord($c) - ord('A')] == $num) {
                    return $this->dfs($words, $result, 0, $pos + 1, intval($sum / 10));
                }
                return false;
            } else {
                if ($this->n2C[$num] != -1) {
                    return false;
                }
                $this->c2N[ord($c) - ord('A')] = $num;
                $this->n2C[$num] = ord($c);
                $check = $this->dfs($words, $result, 0, $pos + 1, intval($sum / 10));
                if ($check) {
                    return true;
                }
                $this->n2C[$num] = -1;
                $this->c2N[ord($c) - ord('A')] = -1;
                return false;
            }
        } else {
            $word = $words[$wordIdx];
            if (strlen($word) <= $pos) {
                return $this->dfs($words, $result, $wordIdx + 1, $pos, $x);
            } else {
                $c = $word[strlen($word) - 1 - $pos];
                if ($this->c2N[ord($c) - ord('A')] != -1) {
                    return $this->dfs($words, $result, $wordIdx + 1, $pos, $x);
                } else {
                    if ($this->not0[ord($c) - ord('A')]) {
                        for ($i = 1; $i < 10; $i++) {
                            if ($this->n2C[$i] == -1) {
                                $this->n2C[$i] = ord($c);
                                $this->c2N[ord($c) - ord('A')] = $i;
                                $check = $this->dfs($words, $result, $wordIdx + 1, $pos, $x);
                                if ($check) {
                                    return true;
                                }
                                $this->c2N[ord($c) - ord('A')] = -1;
                                $this->n2C[$i] = -1;
                            }
                        }
                    } else {
                        for ($i = 0; $i < 10; $i++) {
                            if ($this->n2C[$i] == -1) {
                                $this->n2C[$i] = ord($c);
                                $this->c2N[ord($c) - ord('A')] = $i;
                                $check = $this->dfs($words, $result, $wordIdx + 1, $pos, $x);
                                if ($check) {
                                    return true;
                                }
                                $this->c2N[ord($c) - ord('A')] = -1;
                                $this->n2C[$i] = -1;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
}
