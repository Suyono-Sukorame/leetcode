class Solution {

/**
 * @param String[] $words
 * @param String[] $puzzles
 * @return Integer[]
 */
function findNumOfValidWords($words, $puzzles) {
    $result = [];
    $binaryCount = [];

    foreach ($words as $word) {
        $wordMask = 0;
        $wordLetters = str_split($word);
        foreach ($wordLetters as $char) {
            $wordMask |= 1 << (ord($char) - ord('a'));
        }
        if (!isset($binaryCount[$wordMask])) {
            $binaryCount[$wordMask] = 1;
        } else {
            $binaryCount[$wordMask]++;
        }
    }

    foreach ($puzzles as $puzzle) {
        $validCount = 0;
        $puzzleMask = 1 << (ord($puzzle[0]) - ord('a'));
        $puzzleLength = strlen($puzzle) - 1;

        for ($i = 0; $i < (1 << $puzzleLength); ++$i) {
            $currentPuzzleMask = $puzzleMask;
            for ($j = 0; $j < $puzzleLength; ++$j) {
                if (($i & (1 << $j)) > 0) {
                    $currentPuzzleMask |= 1 << (ord($puzzle[$j + 1]) - ord('a'));
                }
            }

            if (isset($binaryCount[$currentPuzzleMask])) {
                $validCount += $binaryCount[$currentPuzzleMask];
            }
        }

        $result[] = $validCount;
    }

    return $result;
}
}
