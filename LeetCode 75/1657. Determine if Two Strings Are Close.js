/**
 * @param {string} word1
 * @param {string} word2
 * @return {boolean}
 */
var closeStrings = function (word1, word2) {
  if (word1.length !== word2.length) {
    return false;
  }

  const freqMap1 = new Map();
  const freqMap2 = new Map();

  // Count the frequency of each character in word1.
  for (let char of word1) {
    freqMap1.set(char, (freqMap1.get(char) || 0) + 1);
  }

  // Count the frequency of each character in word2.
  for (let char of word2) {
    freqMap2.set(char, (freqMap2.get(char) || 0) + 1);
  }

  // Check if the sets of characters are the same in both words.
  const chars1 = [...freqMap1.keys()].sort().toString();
  const chars2 = [...freqMap2.keys()].sort().toString();

  // Check if the frequencies are the same in both words.
  const freqs1 = [...freqMap1.values()].sort().toString();
  const freqs2 = [...freqMap2.values()].sort().toString();

  return chars1 === chars2 && freqs1 === freqs2;
};
