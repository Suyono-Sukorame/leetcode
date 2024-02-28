class Car {
    public $position;
    public $speed;
    
    public function __construct($position, $speed) {
        $this->position = $position;
        $this->speed = $speed;
    }
}

class Solution {
    function carFleet($target, $position, $speed) {
        $n = count($position);
        $cars = [];
        
        for ($i = 0; $i < $n; $i++) {
            $cars[] = new Car($position[$i], $speed[$i]);
        }
        
        usort($cars, function($a, $b) {
            return $b->position - $a->position;
        });
        
        $stack = [];
        
        foreach ($cars as $car) {
            $time = ($target - $car->position) / $car->speed;
            
            if (empty($stack) || end($stack) < $time) {
                array_push($stack, $time);
            }
        }
        
        return count($stack);
    }
}
