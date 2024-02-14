/*
 * The rand7() API is already defined for you.
 * @return a random integer in the range 1 to 7
 * function rand7();
*/

class Solution {
    /**
     * @return Integer
     */
    function rand10() {
        while (true) {
            $rand49 = (rand7() - 1) * 7 + rand7();
            if ($rand49 <= 40) {
                return ($rand49 % 10) + 1;
            }
        }
    }
}
