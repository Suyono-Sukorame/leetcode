/**
 * @param {string} s
 * @return {string}
 */
var removeStars = function (s) {
  const stack = [];

  for (let i = 0; i < s.length; i++) {
    if (s[i] === "*") {
      // Remove the closest non-star character to the left
      while (stack.length > 0 && stack[stack.length - 1] === "*") {
        stack.pop(); // Remove consecutive stars
        stack.pop(); // Remove the non-star character to the left
      }

      // Handle the case where the star is at the beginning of the string
      if (stack.length > 0) {
        stack.pop(); // Remove the non-star character to the left
      }
    } else {
      stack.push(s[i]);
    }
  }

  return stack.join("");
};

// Test cases
console.log(removeStars("leet**cod*e")); // Output: "lecoe"
console.log(removeStars("erase*****")); // Output: ""
