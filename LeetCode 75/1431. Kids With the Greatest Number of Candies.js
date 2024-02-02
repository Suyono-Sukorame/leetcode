/**
 * @param {number[]} candies
 * @param {number} extraCandies
 * @return {boolean[]}
 */
var kidsWithCandies = function (candies, extraCandies) {
    // Find the maximum number of candies among the kids
    const maxCandies = Math.max(...candies);

    // Check if each kid, after receiving extra candies, has the greatest number
    return candies.map((kidCandies) => kidCandies + extraCandies >= maxCandies);
};

// Example usage:
const example1 = kidsWithCandies([2, 3, 5, 1, 3], 3);
console.log(example1); // Output: [true, true, true, false, true]

const example2 = kidsWithCandies([4, 2, 1, 1, 2], 1);
console.log(example2); // Output: [true, false, false, false, false]

const example3 = kidsWithCandies([12, 1, 12], 10);
console.log(example3); // Output: [true, false, true]
