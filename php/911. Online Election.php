class TopVotedCandidate {
    private $persons;
    private $times;
    private $leaders;

    /**
     * @param Integer[] $persons
     * @param Integer[] $times
     */
    function __construct($persons, $times) {
        $this->persons = $persons;
        $this->times = $times;
        $this->leaders = [];
        
        $voteCount = [];
        $currentLeader = -1;
        
        foreach ($persons as $i => $person) {
            $voteCount[$person] = ($voteCount[$person] ?? 0) + 1;
            if ($currentLeader === -1 || $voteCount[$person] >= $voteCount[$currentLeader]) {
                $currentLeader = $person;
            }
            $this->leaders[$times[$i]] = $currentLeader;
        }
    }
  
    /**
     * @param Integer $t
     * @return Integer
     */
    function q($t) {
        $keys = array_keys($this->leaders);
        $left = 0;
        $right = count($keys) - 1;
        
        // Binary search to find the closest time less than or equal to $t
        while ($left < $right) {
            $mid = $left + intdiv($right - $left, 2);
            if ($keys[$mid] <= $t) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        
        if ($keys[$left] <= $t) {
            return $this->leaders[$keys[$left]];
        } elseif ($left > 0) {
            return $this->leaders[$keys[$left - 1]];
        } else {
            return -1;
        }
    }
}