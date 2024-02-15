class Solution {

/**
 * @param Integer[] $nums
 * @return Float[]
 */
function medianSlidingWindow(array &$nums, int $k):array  {
    $medians  = [];
    $hashTable = [];
    $small = new SplMaxHeap();
    $large = new SplMinHeap();

    for($i=0; $i < $k; $i++) {
         $small->insert($nums[$i]);
    }
    for($j=0; $j < intdiv($k, 2); $j++) {
        $large->insert($small->extract());
    }
    $isOdd = $k & 1 === 1; 

    while (true) {
        $medians[] = $isOdd ? $small->top() : ($small->top() + $large->top()) / 2;

        if ($i >= count($nums)) break;

        $outNum = $nums[$i - $k];
        $inNum = $nums[$i++];
        $balance = 0;
        $balance += ($outNum <= $small->top() ? -1 : 1);

        $hashTable[$outNum]++;
        if (!$small->isEmpty() && $inNum <= $small->top()){
            $balance++;
            $small->insert($inNum);
        } else {
            $balance--;
            $large->insert($inNum);
        }

        if ($balance < 0) {
            $small->insert($large->extract());
            $balance++;

        } 
         if ($balance > 0) {
            $large->insert($small->extract());
            $balance--;
        }
        while(!$small->isEmpty() && $hashTable[$small->top()] ?? 0) {
            $hashTable[$small->extract()]--;
        }
        while(!$large->isEmpty() && $hashTable[$large->top()] ?? 0) {
            $hashTable[$large->extract()]--;
        }
    }

    return $medians;
}
}
