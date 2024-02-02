/**
 * @param {number} n - a positive integer
 * @return {number} - a positive integer
 */
var reverseBits = function (n) {
    let result = 0;

    // Iterate through each bit in the 32-bit integer
    for (let i = 0; i < 32; i++) {
        // Shift the result to the left to make room for the next bit
        result <<= 1;

        // Get the rightmost bit of the input integer and add it to the result
        result |= n & 1;

        // Shift the input integer to the right to consider the next bit
        n >>= 1;
    }

    return result >>> 0; // Ensure the result is treated as an unsigned integer
};

// Test cases
console.log(reverseBits(0b00000010100101000001111010011100)); // Output: 964176192
console.log(reverseBits(0b11111111111111111111111111111101)); // Output: 3221225471
