class Solution {
    const WORD_LENGTH = 6;

    function findSecretWord($words, $master) {
        $numWords = count($words);
        $eliminate = array_fill(0, $numWords, false);
        $index = 0;
        $output = $master->guess($words[$index]);
        
        while ($output !== self::WORD_LENGTH) {
            $lastGuess = $index;
            $eliminate[$lastGuess] = true;
            
            for ($i = 0; $i < $numWords; $i++) {
                if ($eliminate[$i]) {
                    continue;
                }
                
                $total = 0;
                for ($j = 0; $j < self::WORD_LENGTH; $j++) {
                    if ($words[$lastGuess][$j] === $words[$i][$j]) {
                        $total++;
                    }
                }
                
                if ($total !== $output) {
                    $eliminate[$i] = true;
                } else {
                    $index = $i;
                }
            }
            
            $output = $master->guess($words[$index]);
        }
    }
}
