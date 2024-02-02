/**
 * @param {number} left
 * @param {number} right
 * @return {number}
 */
var rangeBitwiseAnd = function (left, right) {
    let shift = 0;

    // Keep shifting right until left and right become equal
    while (left < right) {
        left >>= 1;
        right >>= 1;
        shift++;
    }

    // Left shift the common bits to the original position
    return left << shift;
};

// Test cases
console.log(rangeBitwiseAnd(5, 7));                  // Output: 4
console.log(rangeBitwiseAnd(0, 0));                  // Output: 0
console.log(rangeBitwiseAnd(1, 2147483647));         // Output: 0
