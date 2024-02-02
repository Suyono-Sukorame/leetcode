/**
 * @param {character[]} chars
 * @return {number}
 */
var compress = function (chars) {
  let writeIndex = 0;
  let readIndex = 0;

  while (readIndex < chars.length) {
    let count = 0;
    const currentChar = chars[readIndex];

    while (readIndex < chars.length && chars[readIndex] === currentChar) {
      readIndex++;
      count++;
    }

    chars[writeIndex++] = currentChar;

    if (count > 1) {
      for (const digit of count.toString()) {
        chars[writeIndex++] = digit;
      }
    }
  }

  return writeIndex;
};
