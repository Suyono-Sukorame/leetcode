/**
 * @param {string} s
 * @return {string}
 */
var reverseVowels = function (s) {
    const vowels = new Set(['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']);
    const sArray = s.split('');

    let left = 0;
    let right = sArray.length - 1;

    while (left < right) {
        while (left < right && !vowels.has(sArray[left])) {
            left++;
        }

        while (left < right && !vowels.has(sArray[right])) {
            right--;
        }

        // Swap vowels
        [sArray[left], sArray[right]] = [sArray[right], sArray[left]];

        left++;
        right--;
    }

    return sArray.join('');
};

// Example usage:
const example1 = reverseVowels("hello");
console.log(example1); // Output: "holle"

const example2 = reverseVowels("leetcode");
console.log(example2); // Output: "leotcede"
