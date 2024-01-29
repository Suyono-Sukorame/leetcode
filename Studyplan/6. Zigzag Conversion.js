/**
 * @param {string} s
 * @param {number} numRows
 * @return {string}
 */
var convert = function (s, numRows) {
  if (numRows === 1) {
    return s;
  }

  const rows = new Array(numRows).fill("");
  let direction = 1;
  let currentRow = 0;

  for (const char of s) {
    rows[currentRow] += char;

    if (currentRow === 0) {
      direction = 1;
    } else if (currentRow === numRows - 1) {
      direction = -1;
    }

    currentRow += direction;
  }

  return rows.join("");
};

console.log(convert("PAYPALISHIRING", 3)); // Output: "PAHNAPLSIIGYIR"
console.log(convert("PAYPALISHIRING", 4)); // Output: "PINALSIGYAHRPI"
console.log(convert("A", 1)); // Output: "A"
