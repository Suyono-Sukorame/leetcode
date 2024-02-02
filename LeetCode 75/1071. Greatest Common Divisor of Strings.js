/**
 * @param {string} str1
 * @param {string} str2
 * @return {string}
 */
var gcdOfStrings = function (str1, str2) {
    // Check if the lengths of both strings sum up to the same length
    if (str1.length + str2.length !== str2.length + str1.length) {
        return "";
    }

    // Check if the strings are equal to each other
    if (str1 + str2 !== str2 + str1) {
        return "";
    }

    // Find the greatest common divisor of the lengths
    const gcd = (a, b) => (b === 0 ? a : gcd(b, a % b));
    const len = gcd(str1.length, str2.length);

    // Return the substring of length 'len'
    return str1.substring(0, len);
};

// Example usage:
const example1 = gcdOfStrings("ABCABC", "ABC");
console.log(example1); // Output: "ABC"

const example2 = gcdOfStrings("ABABAB", "ABAB");
console.log(example2); // Output: "AB"

const example3 = gcdOfStrings("LEET", "CODE");
console.log(example3); // Output: ""
