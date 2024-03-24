class Solution {
    /**
     * @param String $s
     * @return String[]
     */
    function printVertically($s) {
        $words = explode(" ", $s);
        $maxLength = 0;

        foreach ($words as $word) {
            $maxLength = max($maxLength, strlen($word));
        }

        $result = [];

        for ($i = 0; $i < $maxLength; $i++) {
            $column = "";
            foreach ($words as $word) {
                $column .= isset($word[$i]) ? $word[$i] : " ";
            }
            $column = rtrim($column);
            $result[] = $column;
        }

        return $result;
    }
}
