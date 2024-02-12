class Solution {

/**
 * @param Integer[] $data
 * @return Boolean
 */
function validUtf8($data) {
    $count = count($data);
    $i = 0;
    
    while ($i < $count) {
        $numBytes = $this->getNumBytes($data[$i]);
        
        if ($numBytes == 0) {
            return false;
        }
        
        for ($j = $i + 1; $j < $i + $numBytes; $j++) {
            if ($j >= $count || ($data[$j] >> 6) != 0b10) {
                return false;
            }
        }
        
        $i += $numBytes;
    }
    
    return true;
}

function getNumBytes($num) {
    if (($num >> 7) == 0) {
        return 1; // 1-byte character
    } elseif (($num >> 5) == 0b110) {
        return 2; // 2-byte character
    } elseif (($num >> 4) == 0b1110) {
        return 3; // 3-byte character
    } elseif (($num >> 3) == 0b11110) {
        return 4; // 4-byte character
    } else {
        return 0; // Invalid character
    }
}
}
