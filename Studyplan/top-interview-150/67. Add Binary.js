/**
 * @param {string} a
 * @param {string} b
 * @return {string}
 */
var addBinary = function (a, b) {
    let result = "";
    let carry = 0;

    // Start from the rightmost digits of both strings
    let i = a.length - 1;
    let j = b.length - 1;

    // Loop through both strings until we reach the beginning of either string
    while (i >= 0 || j >= 0) {
        // Get the current digits or assume 0 if we've reached the beginning of a string
        let digitA = i >= 0 ? parseInt(a[i]) : 0;
        let digitB = j >= 0 ? parseInt(b[j]) : 0;

        // Calculate the sum of the current digits and the carry from the previous step
        let sum = digitA + digitB + carry;

        // Determine the current digit and update the carry for the next iteration
        result = (sum % 2) + result;
        carry = Math.floor(sum / 2);

        // Move to the next digits in both strings
        i--;
        j--;
    }

    // If there's still a carry after the loop, add it to the leftmost side of the result
    if (carry > 0) {
        result = carry + result;
    }

    return result;
};

// Test cases
console.log(addBinary("11", "1"));      // Output: "100"
console.log(addBinary("1010", "1011")); // Output: "10101"
