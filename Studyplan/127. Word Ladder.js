/**
 * @param {string} beginWord
 * @param {string} endWord
 * @param {string[]} wordList
 * @return {number}
 */
var ladderLength = function (beginWord, endWord, wordList) {
  if (!wordList.includes(endWord)) {
    return 0; // endWord is not in wordList
  }

  const wordSet = new Set(wordList);
  const queue = [[beginWord, 1]];

  while (queue.length > 0) {
    const [currentWord, transformations] = queue.shift();

    if (currentWord === endWord) {
      return transformations;
    }

    for (let i = 0; i < currentWord.length; i++) {
      for (let j = 97; j <= 122; j++) {
        const nextWord = currentWord.slice(0, i) + String.fromCharCode(j) + currentWord.slice(i + 1);

        if (wordSet.has(nextWord)) {
          queue.push([nextWord, transformations + 1]);
          wordSet.delete(nextWord); // Mark the word as visited
        }
      }
    }
  }

  return 0; // No transformation sequence found
};
