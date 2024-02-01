/**
 * @param {string} ransomNote
 * @param {string} magazine
 * @return {boolean}
 */
var canConstruct = function (ransomNote, magazine) {
  const charCount = {};

  for (const char of magazine) {
    charCount[char] = (charCount[char] || 0) + 1;
  }

  for (const char of ransomNote) {
    if (!charCount[char]) {
      return false;
    }
    charCount[char]--;
  }

  return true;
};

console.log(canConstruct("a", "b")); // Output: false
console.log(canConstruct("aa", "ab")); // Output: false
console.log(canConstruct("aa", "aab")); // Output: true
