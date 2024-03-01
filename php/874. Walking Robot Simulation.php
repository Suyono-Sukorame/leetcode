class Solution {

const NORTH = 0;
const EAST = 1;
const SOUTH = 2;
const WEST = 3;

const MOVES = [
    self::NORTH => [0, 1],
    self::EAST => [1, 0],
    self::SOUTH => [0, -1],
    self::WEST => [-1, 0]
];

const LEFT_TURNS = [
    self::NORTH => self::WEST,
    self::EAST => self::NORTH,
    self::SOUTH => self::EAST,
    self::WEST => self::SOUTH
];

const RIGHT_TURNS = [
    self::NORTH => self::EAST,
    self::EAST => self::SOUTH,
    self::SOUTH => self::WEST,
    self::WEST => self::NORTH
];

function robotSim($commands, $obstacles) {
    $obstacleSet = [];
    foreach ($obstacles as $obstacle) {
        $obstacleSet[$obstacle[0]][$obstacle[1]] = true;
    }
    
    $direction = self::NORTH;
    $x = $y = 0;
    $maxDistance = 0;
    
    foreach ($commands as $command) {
        if ($command == -1) {
            $direction = self::RIGHT_TURNS[$direction];
        } elseif ($command == -2) {
            $direction = self::LEFT_TURNS[$direction];
        } else {
            for ($i = 0; $i < $command; $i++) {
                $nextX = $x + self::MOVES[$direction][0];
                $nextY = $y + self::MOVES[$direction][1];
                
                if (isset($obstacleSet[$nextX][$nextY])) {
                    break;
                }
                
                $x = $nextX;
                $y = $nextY;
                $maxDistance = max($maxDistance, $x * $x + $y * $y);
            }
        }
    }
    
    return $maxDistance;
}
}
