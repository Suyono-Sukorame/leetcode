/**
 * @param {string} s1
 * @param {string} s2
 * @return {boolean}
 */
var isScramble = function (s1, s2) {
  const memo = new Map();

  const areAnagrams = (str1, str2) => {
    const charCount = new Array(26).fill(0);

    for (let i = 0; i < str1.length; i++) {
      charCount[str1.charCodeAt(i) - "a".charCodeAt(0)]++;
      charCount[str2.charCodeAt(i) - "a".charCodeAt(0)]--;
    }

    return charCount.every((count) => count === 0);
  };

  const helper = (str1, str2) => {
    const memoKey = `${str1}-${str2}`;
    if (memo.has(memoKey)) {
      return memo.get(memoKey);
    }

    if (str1 === str2) {
      memo.set(memoKey, true);
      return true;
    }

    if (!areAnagrams(str1, str2)) {
      memo.set(memoKey, false);
      return false;
    }

    for (let i = 1; i < str1.length; i++) {
      const str1Left = str1.slice(0, i);
      const str1Right = str1.slice(i);

      const str2Left1 = str2.slice(0, i);
      const str2Right1 = str2.slice(i);

      const str2Left2 = str2.slice(0, str2.length - i);
      const str2Right2 = str2.slice(str2.length - i);

      if ((helper(str1Left, str2Left1) && helper(str1Right, str2Right1)) || (helper(str1Left, str2Right2) && helper(str1Right, str2Left2))) {
        memo.set(memoKey, true);
        return true;
      }
    }

    memo.set(memoKey, false);
    return false;
  };

  return helper(s1, s2);
};

console.log(isScramble("great", "rgeat")); // Output: true
console.log(isScramble("abcde", "caebd")); // Output: false
console.log(isScramble("a", "a")); // Output: true
console.log(isScramble("eebaacbcbcadaaedceaaacadccd", "eadcaacabaddaceacbceaabeccd")); // Output: false
