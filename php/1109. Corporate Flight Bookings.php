class Solution {

/**
 * @param Integer[][] $bookings
 * @param Integer $n
 * @return Integer[]
 */
function corpFlightBookings($bookings, $n) {
    $result = array_fill(0, $n, 0);
    
    foreach ($bookings as $booking) {
        $first = $booking[0];
        $last = $booking[1];
        $seats = $booking[2];
        
        $result[$first - 1] += $seats;
        if ($last < $n) {
            $result[$last] -= $seats;
        }
    }
    
    for ($i = 1; $i < $n; $i++) {
        $result[$i] += $result[$i - 1];
    }
    
    return $result;
}
}
