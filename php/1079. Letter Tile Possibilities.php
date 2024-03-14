class Solution {
    function numTilePossibilities($tiles) {
        $counter = array_fill(0, 26, 0);
        $total = 0;

        for ($i = 0; $i < strlen($tiles); $i++) {
            $counter[ord($tiles[$i]) - ord('A')]++;
        }

        $this->calculate($counter, $total);

        return $total;
    }

    function calculate($counter, &$total) {
        for ($i = 0; $i < 26; $i++) {
            if ($counter[$i] == 0) continue;

            $total++;
            $counter[$i]--;
            $this->calculate($counter, $total);
            $counter[$i]++;
        }
    }
}
