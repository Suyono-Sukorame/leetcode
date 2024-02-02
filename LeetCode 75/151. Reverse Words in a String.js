/**
 * @param {string} s
 * @return {string}
 */
var reverseWords = function (s) {
  let temp = "";
  let res = "";
  for (let i = s.length - 1; i >= 0; i--) {
    if (s[i] === " ") {
      if (temp !== "") {
        res += temp + " ";
        temp = "";
      }
      continue;
    }

    temp = s[i] + temp;
  }

  if (temp === "") res = res.slice(0, -1);

  return res + temp;
};
