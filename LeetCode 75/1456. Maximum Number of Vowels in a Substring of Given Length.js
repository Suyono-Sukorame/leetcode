/**
 * @param {string} s
 * @param {number} k
 * @return {number}
 */
var maxVowels = function (s, k) {
  const vowels = new Set(["a", "e", "i", "o", "u"]);
  let maxVowelCount = 0;
  let currentVowelCount = 0;

  // Initialize vowel count for the first substring of length k.
  for (let i = 0; i < k; i++) {
    if (vowels.has(s[i])) {
      currentVowelCount++;
    }
  }

  maxVowelCount = currentVowelCount;

  // Iterate through the remaining substrings and update vowel count.
  for (let i = k; i < s.length; i++) {
    if (vowels.has(s[i - k])) {
      currentVowelCount--;
    }
    if (vowels.has(s[i])) {
      currentVowelCount++;
    }
    maxVowelCount = Math.max(maxVowelCount, currentVowelCount);
  }

  return maxVowelCount;
};
