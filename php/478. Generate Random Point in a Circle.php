class Solution {
    private $radius;
    private $x_center;
    private $y_center;

    /**
     * @param Float $radius
     * @param Float $x_center
     * @param Float $y_center
     */
    function __construct($radius, $x_center, $y_center) {
        $this->radius = $radius;
        $this->x_center = $x_center;
        $this->y_center = $y_center;
    }
  
    /**
     * @return Float[]
     */
    function randPoint() {
        $r = sqrt(mt_rand() / mt_getrandmax()) * $this->radius;
        $theta = mt_rand() / mt_getrandmax() * 2 * M_PI;
        
        $x = $this->x_center + $r * cos($theta);
        $y = $this->y_center + $r * sin($theta);
        
        return [$x, $y];
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($radius, $x_center, $y_center);
 * $ret_1 = $obj->randPoint();
 */
