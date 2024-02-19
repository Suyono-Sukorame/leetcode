class Solution {

/**
 * @param String[] $paths
 * @return String[][]
 */
function findDuplicate($paths) {
    $contentMap = [];

    foreach ($paths as $pathInfo) {
        $parts = explode(' ', $pathInfo);
        $dir = array_shift($parts);

        foreach ($parts as $part) {
            list($fileName, $content) = explode('(', $part);
            $content = substr($content, 0, -1);

            $fullPath = $dir . '/' . $fileName;

            if (!isset($contentMap[$content])) {
                $contentMap[$content] = [];
            }
            $contentMap[$content][] = $fullPath;
        }
    }

    $duplicateFiles = array_filter($contentMap, function ($files) {
        return count($files) > 1;
    });

    return array_values($duplicateFiles);
}
}
