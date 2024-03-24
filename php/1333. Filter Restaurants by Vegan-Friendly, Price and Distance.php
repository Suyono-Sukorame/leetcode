class Solution {

function filterRestaurants($restaurants, $veganFriendly, $maxPrice, $maxDistance) {
    $filteredRestaurants = [];
    
    foreach ($restaurants as $restaurant) {
        list($id, $rating, $isVeganFriendly, $price, $distance) = $restaurant;
        
        if (($veganFriendly == 0 || $isVeganFriendly == $veganFriendly) &&
            $price <= $maxPrice && $distance <= $maxDistance) {
            $filteredRestaurants[] = array($id, $rating);
        }
    }
    
    usort($filteredRestaurants, function ($a, $b) {
        if ($a[1] == $b[1]) {
            return $b[0] - $a[0];
        }
        return $b[1] - $a[1];
    });
    
    $result = [];
    foreach ($filteredRestaurants as $restaurant) {
        $result[] = $restaurant[0];
    }
    
    return $result;
}
}
