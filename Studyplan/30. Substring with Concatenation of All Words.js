/**
 * @param {string} s
 * @param {string[]} words
 * @return {number[]}
 */
var findSubstring = function (s, words) {
  const result = [];
  const wordLength = words[0].length;
  const totalLength = words.length * wordLength;

  const wordCountMap = {};

  for (const word of words) {
    if (wordCountMap[word] === undefined) {
      wordCountMap[word] = 1;
    } else {
      wordCountMap[word]++;
    }
  }

  for (let i = 0; i <= s.length - totalLength; i++) {
    const substring = s.substring(i, i + totalLength);
    const wordMap = {};

    for (let j = 0; j < totalLength; j += wordLength) {
      const currentWord = substring.substring(j, j + wordLength);

      if (wordCountMap[currentWord] === undefined) {
        break;
      }

      if (wordMap[currentWord] === undefined) {
        wordMap[currentWord] = 1;
      } else {
        wordMap[currentWord]++;
      }

      if (wordMap[currentWord] > wordCountMap[currentWord]) {
        break;
      }

      if (j === totalLength - wordLength) {
        result.push(i);
      }
    }
  }

  return result;
};
