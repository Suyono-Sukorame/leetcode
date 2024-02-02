/**
 * @param {number} low
 * @param {number} high
 * @return {number[]}
 */
var sequentialDigits = function (low, high) {
    const result = [];

    for (let digit = 1; digit <= 9; digit++) {
        let num = digit;

        for (let nextDigit = digit + 1; nextDigit <= 9; nextDigit++) {
            num = num * 10 + nextDigit;
            if (num >= low && num <= high) {
                result.push(num);
            }
        }
    }

    return result.sort((a, b) => a - b);
};

// Example usage:
const result1 = sequentialDigits(100, 300);
console.log(result1); // Output: [123, 234]

const result2 = sequentialDigits(1000, 13000);
console.log(result2); // Output: [1234, 2345, 3456, 4567, 5678, 6789, 12345]
