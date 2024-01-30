/**
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isIsomorphic = function (s, t) {
  if (s.length !== t.length) {
    return false;
  }

  const sToTMap = {};
  const tToSMap = {};

  for (let i = 0; i < s.length; i++) {
    const sChar = s[i];
    const tChar = t[i];

    if (sToTMap[sChar]) {
      if (sToTMap[sChar] !== tChar) {
        return false;
      }
    } else {
      sToTMap[sChar] = tChar;
    }

    if (tToSMap[tChar]) {
      if (tToSMap[tChar] !== sChar) {
        return false;
      }
    } else {
      tToSMap[tChar] = sChar;
    }
  }

  return true;
};

console.log(isIsomorphic("egg", "add")); // Output: true
console.log(isIsomorphic("foo", "bar")); // Output: false
console.log(isIsomorphic("paper", "title")); // Output: true
