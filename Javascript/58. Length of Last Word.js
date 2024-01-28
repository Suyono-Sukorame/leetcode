/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLastWord = function (s) {
    s = s.trim();

    const lastSpaceIndex = s.lastIndexOf(' ');

    if (lastSpaceIndex === -1) {
        return s.length;
    }

    return s.length - lastSpaceIndex - 1;
};

console.log(lengthOfLastWord("Hello World"));
console.log(lengthOfLastWord("   fly me   to   the moon  "));
console.log(lengthOfLastWord("luffy is still joyboy"));
