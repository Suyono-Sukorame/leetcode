/**
 * @param {string} s
 * @return {boolean}
 */
var isPalindrome = function (s) {
  const cleanedString = s.toLowerCase().replace(/[^a-z0-9]/g, "");

  return cleanedString === cleanedString.split("").reverse().join("");
};

console.log(isPalindrome("A man, a plan, a canal: Panama")); // Output: true
console.log(isPalindrome("race a car")); // Output: false
console.log(isPalindrome(" ")); // Output: true
