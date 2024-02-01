/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLastWord = function (s) {
  s = s.trim();

  let length = 0;
  let i = s.length - 1;

  while (i >= 0 && s[i] !== " ") {
    length++;
    i--;
  }

  return length;
};

// Example usage:
console.log(lengthOfLastWord("Hello World")); // Output: 5
console.log(lengthOfLastWord("   fly me   to   the moon  ")); // Output: 4
console.log(lengthOfLastWord("luffy is still joyboy")); // Output: 6
