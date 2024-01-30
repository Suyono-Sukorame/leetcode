/**
 * @param {string} pattern
 * @param {string} s
 * @return {boolean}
 */
var wordPattern = function (pattern, s) {
  const patternToWordMap = new Map();
  const wordToPatternMap = new Map();
  const words = s.split(" ");

  if (pattern.length !== words.length) {
    return false;
  }

  for (let i = 0; i < pattern.length; i++) {
    const patternChar = pattern[i];
    const currentWord = words[i];

    if (patternToWordMap.has(patternChar)) {
      if (patternToWordMap.get(patternChar) !== currentWord) {
        return false;
      }
    } else {
      if (wordToPatternMap.has(currentWord)) {
        return false; // If the word is already mapped to another pattern character
      }

      patternToWordMap.set(patternChar, currentWord);
    }

    if (wordToPatternMap.has(currentWord)) {
      if (wordToPatternMap.get(currentWord) !== patternChar) {
        return false;
      }
    } else {
      wordToPatternMap.set(currentWord, patternChar);
    }
  }

  return true;
};

// Example usage:
console.log(wordPattern("abba", "dog cat cat dog")); // Output: true
console.log(wordPattern("abba", "dog cat cat fish")); // Output: false
console.log(wordPattern("aaaa", "dog cat cat dog")); // Output: false
