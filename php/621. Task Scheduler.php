class Solution {

/**
 * @param String[] $tasks
 * @param Integer $n
 * @return Integer
 */
function leastInterval($tasks, $n) {
    
    $record = [];
    foreach ($tasks as $task) {
        $record[$task] = isset($record[$task]) ? $record[$task] + 1 : 1;
    }

    sort($record);

    $len = count($record);
    $max_n = $record[$len - 1] - 1;
    $space = $max_n * $n;

    for ($i=$len - 2; $i >= 0; $i--) { 

        $space = $space - min($max_n, $record[$i]);
    }

    return $space > 0 ? count($tasks) + $space : count($tasks);
}
}
