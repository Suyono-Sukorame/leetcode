/**
 * @param {string} s
 * @param {string} t
 * @return {string}
 */
var minWindow = function (s, t) {
  const charCount = new Map();

  for (const char of t) {
    charCount.set(char, (charCount.get(char) || 0) + 1);
  }

  let left = 0;
  let right = 0;
  let requiredChars = t.length;
  let minLen = Infinity;
  let minWindowStart = 0;

  while (right < s.length) {
    const charRight = s[right];

    if (charCount.has(charRight)) {
      charCount.set(charRight, charCount.get(charRight) - 1);

      if (charCount.get(charRight) >= 0) {
        requiredChars--;
      }
    }

    while (requiredChars === 0) {
      if (right - left < minLen) {
        minLen = right - left;
        minWindowStart = left;
      }

      const charLeft = s[left];

      if (charCount.has(charLeft)) {
        charCount.set(charLeft, charCount.get(charLeft) + 1);

        if (charCount.get(charLeft) > 0) {
          requiredChars++;
        }
      }

      left++;
    }

    right++;
  }

  return minLen === Infinity ? "" : s.substr(minWindowStart, minLen + 1);
};

console.log(minWindow("ADOBECODEBANC", "ABC"));
console.log(minWindow("a", "a"));
console.log(minWindow("a", "aa"));
