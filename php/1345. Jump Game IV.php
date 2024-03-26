class Solution {

function minJumps($arr) {
    $n = count($arr);
    if ($n <= 1) return 0;

    $graph = [];
    for ($i = 0; $i < $n; $i++) {
        if (!isset($graph[$arr[$i]])) $graph[$arr[$i]] = [];
        $graph[$arr[$i]][] = $i;
    }

    $visited = array_fill(0, $n, false);
    $queue = new SplQueue();
    $queue->enqueue(0);
    $visited[0] = true;
    $steps = 0;

    while (!$queue->isEmpty()) {
        $size = $queue->count();
        for ($i = 0; $i < $size; $i++) {
            $index = $queue->dequeue();
            if ($index == $n - 1) return $steps;

            if ($index - 1 >= 0 && !$visited[$index - 1]) {
                $queue->enqueue($index - 1);
                $visited[$index - 1] = true;
            }
            if ($index + 1 < $n && !$visited[$index + 1]) {
                $queue->enqueue($index + 1);
                $visited[$index + 1] = true;
            }
            foreach ($graph[$arr[$index]] as $nextIndex) {
                if (!$visited[$nextIndex]) {
                    $queue->enqueue($nextIndex);
                    $visited[$nextIndex] = true;
                }
            }
            $graph[$arr[$index]] = [];
        }
        $steps++;
    }

    return -1;
}
}
