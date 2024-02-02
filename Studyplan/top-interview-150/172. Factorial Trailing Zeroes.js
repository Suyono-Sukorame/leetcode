/**
 * @param {number} n
 * @return {number}
 */
var trailingZeroes = function (n) {
    let count = 0;

    // Keep dividing by 5 and accumulating the count
    while (n > 0) {
        n = Math.floor(n / 5);
        count += n;
    }

    return count;
};

// Test cases
console.log(trailingZeroes(3)); // Output: 0
console.log(trailingZeroes(5)); // Output: 1
console.log(trailingZeroes(0)); // Output: 0
