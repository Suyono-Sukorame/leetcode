/**
 * @param {number} n - a positive integer
 * @return {number}
 */
var hammingWeight = function (n) {
    let count = 0;

    // Iterate through each bit in the 32-bit integer
    for (let i = 0; i < 32; i++) {
        // Check if the rightmost bit is 1
        if ((n & 1) === 1) {
            count++;
        }

        // Shift the input integer to the right to consider the next bit
        n >>= 1;
    }

    return count;
};

// Test cases
console.log(hammingWeight(0b00000000000000000000000000001011)); // Output: 3
console.log(hammingWeight(0b00000000000000000000000010000000)); // Output: 1
console.log(hammingWeight(0b11111111111111111111111111111101)); // Output: 31
