class Solution {

function judgeCircle($moves) {
    return substr_count($moves, 'L') == substr_count($moves, 'R') && substr_count($moves, 'U') == substr_count($moves, 'D');
}

}
