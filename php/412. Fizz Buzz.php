class Solution {

/**
 * @param Integer $n
 * @return String[]
 */
function fizzBuzz($n) {
    $result = array();
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $result[] = "FizzBuzz";
        } elseif ($i % 3 == 0) {
            $result[] = "Fizz";
        } elseif ($i % 5 == 0) {
            $result[] = "Buzz";
        } else {
            $result[] = strval($i);
        }
    }
    return $result;
}
}

$solution = new Solution();
print_r($solution->fizzBuzz(3)); // Output: ["1","2","Fizz"]
print_r($solution->fizzBuzz(5)); // Output: ["1","2","Fizz","4","Buzz"]
print_r($solution->fizzBuzz(15)); // Output: ["1","2","Fizz","4","Buzz","Fizz","7","8","Fizz","Buzz","11","Fizz","13","14","FizzBuzz"]
