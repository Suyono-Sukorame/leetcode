/**
 * @param {number[]} nums
 * @return {number}
 */
var singleNumber = function (nums) {
    let result = 0;

    // Use XOR operation to find the single number
    for (let num of nums) {
        result ^= num;
    }

    return result;
};

// Test cases
console.log(singleNumber([2, 2, 1]));       // Output: 1
console.log(singleNumber([4, 1, 2, 1, 2])); // Output: 4
console.log(singleNumber([1]));             // Output: 1
