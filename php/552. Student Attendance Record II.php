class Solution {
    const MAX_INT = 1000000007;

    function checkRecord($n) {
        $arr = array_fill(0, $n + 1, array_fill(0, 6, -1));
        return $this->_checkRecord($n, 0, 0, $arr);
    }

    function _checkRecord($n, $absentAmount, $consecutiveLate, &$arr) {
        if ($absentAmount === 2 || $consecutiveLate === 3)
            return 0;

        if ($n === 0)
            return 1;

        $cell = $absentAmount * 3 + $consecutiveLate;
        if ($arr[$n][$cell] !== -1)
            return $arr[$n][$cell];

        $result = (
            $this->_checkRecord($n - 1, $absentAmount + 1, 0, $arr) +
            $this->_checkRecord($n - 1, $absentAmount, $consecutiveLate + 1, $arr) +
            $this->_checkRecord($n - 1, $absentAmount, 0, $arr)
        ) % self::MAX_INT;

        $arr[$n][$cell] = $result;

        return $result;
    }
}
