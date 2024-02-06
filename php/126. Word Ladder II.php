class Solution {

/**
 * @param String $beginWord
 * @param String $endWord
 * @param String[] $wordList
 * @return String[][]
 */
function findLadders($beginWord, $endWord, $wordList) {
    $result = [];
    $wordSet = array_flip($wordList);
    if (!isset($wordSet[$endWord])) return $result;

    // BFS to find shortest path length
    $graph = $this->buildGraph($wordSet, $beginWord, $endWord);
    $distance = $this->bfs($graph, $beginWord, $endWord);

    if ($distance === -1) return $result;

    // DFS to find all paths with shortest length
    $path = [];
    $this->dfs($result, $path, $beginWord, $endWord, $distance, $graph);

    return $result;
}

function buildGraph($wordSet, $beginWord, $endWord) {
    $graph = [];
    $allWords = $wordSet;
    $allWords[$beginWord] = 1;

    foreach ($allWords as $word => $_) {
        $graph[$word] = [];
        for ($i = 0; $i < strlen($word); $i++) {
            for ($c = ord('a'); $c <= ord('z'); $c++) {
                $newWord = $word;
                $newWord[$i] = chr($c);
                if ($newWord !== $word && isset($wordSet[$newWord])) {
                    $graph[$word][] = $newWord;
                }
            }
        }
    }

    return $graph;
}

function bfs($graph, $beginWord, $endWord) {
    $visited = [];
    $queue = new SplQueue();
    $queue->enqueue([$beginWord, 1]);

    while (!$queue->isEmpty()) {
        list($word, $distance) = $queue->dequeue();
        if ($word === $endWord) {
            return $distance;
        }
        if (isset($visited[$word])) continue;

        $visited[$word] = true;
        foreach ($graph[$word] as $nextWord) {
            if (!isset($visited[$nextWord])) {
                $queue->enqueue([$nextWord, $distance + 1]);
            }
        }
    }

    return -1;
}

function dfs(&$result, &$path, $currentWord, $endWord, $distance, $graph) {
    $path[] = $currentWord;
    if ($currentWord === $endWord) {
        if (count($path) === $distance + 1) {
            $result[] = $path;
        }
        array_pop($path);
        return;
    }
    if (count($path) > $distance) {
        array_pop($path);
        return;
    }

    foreach ($graph[$currentWord] as $nextWord) {
        $this->dfs($result, $path, $nextWord, $endWord, $distance, $graph);
    }
    array_pop($path);
}
}
