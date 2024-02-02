/**
 * @param {string} word1
 * @param {string} word2
 * @return {string}
 */
var mergeAlternately = function (word1, word2) {
    let result = '';
    let i = 0;

    while (i < word1.length || i < word2.length) {
        if (i < word1.length) {
            result += word1[i];
        }

        if (i < word2.length) {
            result += word2[i];
        }

        i++;
    }

    return result;
};

// Example usage:
const example1 = mergeAlternately("abc", "pqr");
console.log(example1); // Output: "apbqcr"

const example2 = mergeAlternately("ab", "pqrs");
console.log(example2); // Output: "apbqrs"

const example3 = mergeAlternately("abcd", "pq");
console.log(example3); // Output: "apbqcd"
