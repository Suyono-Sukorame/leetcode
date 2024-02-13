class Solution {

/**
 * @param String $password
 * @return Integer
 */
function strongPasswordChecker($password) {
    $passwordCharList = str_split($password);

    $missingType = 3;
    $numberFlag = false;
    $capitalFlag = false;
    $lowercaseFlag = false;

    foreach ($passwordCharList as $key => $value){
        if (!$numberFlag && ctype_digit($value)) { 
            $numberFlag = true;
        } else if (!$capitalFlag && ctype_upper($value)) {
            $capitalFlag = true;
        } else if (!$lowercaseFlag && ctype_lower($value)) {
            $lowercaseFlag = true;
        }
    }

    $numberFlag && $missingType--;
    $capitalFlag && $missingType--;
    $lowercaseFlag && $missingType--;

    $change = 0;
    $first = 0;
    $second = 0;
    $charKey = 2;

    while ($charKey < strlen($password)){
        if ($passwordCharList[$charKey] === $passwordCharList[$charKey-1] 
            && $passwordCharList[$charKey] === $passwordCharList[$charKey-2]) {
            $countOfRepeat = 2;

            while ($charKey < strlen($password) 
                && $passwordCharList[$charKey] === $passwordCharList[$charKey-1]) {
                $countOfRepeat++;
                $charKey++;
            }

            $change += floor($countOfRepeat / 3);

            $countOfRepeat % 3 === 0 && $first += 1;
            $countOfRepeat % 3 === 1 && $second += 2;

            continue;
        }

        $charKey++;
    }

    if (strlen($password) < 6) {
        return max($missingType, 6 - strlen($password));
    } elseif (strlen($password) >= 6 && strlen($password) <= 20) {
        return max($missingType, $change);
    }

    $removeKey = strlen($password) - 20;

    $change -= min($removeKey, $first);
    $change -= floor(min(max($removeKey - $first, 0), $second) / 2);
    $change -= floor(max($removeKey - $first - $second, 0) / 3);

    return $removeKey + max($missingType, $change);
}
}

$solution = new Solution();
$password = "aaa111";
echo $solution->strongPasswordChecker($password); // Output: 2
