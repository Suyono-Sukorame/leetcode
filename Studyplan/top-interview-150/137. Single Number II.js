/**
 * @param {number[]} nums
 * @return {number}
 */
var singleNumber = function (nums) {
    let ones = 0;
    let twos = 0;

    for (let num of nums) {
        // Update twos with the bits that are common in both ones and the current num
        twos |= (ones & num);

        // Update ones with the bits that are unique to the current num
        ones ^= num;

        // Determine the common bits (appearing three times) and clear them from both ones and twos
        let commonBits = ones & twos;
        ones &= ~commonBits;
        twos &= ~commonBits;
    }

    return ones;
};

// Test cases
console.log(singleNumber([2, 2, 3, 2]));          // Output: 3
console.log(singleNumber([0, 1, 0, 1, 0, 1, 99])); // Output: 99
