/**
 * @param {string[]} words
 * @param {number} maxWidth
 * @return {string[]}
 */
var fullJustify = function (words, maxWidth) {
  const result = [];
  let line = [];
  let currentWidth = 0;

  for (let i = 0; i < words.length; i++) {
    const word = words[i];

    if (currentWidth + word.length + line.length <= maxWidth) {
      line.push(word);
      currentWidth += word.length;
    } else {
      result.push(justifyLine(line, maxWidth, false));
      line = [word];
      currentWidth = word.length;
    }
  }

  result.push(justifyLine(line, maxWidth, true));

  return result;
};

function justifyLine(words, maxWidth, isLastLine) {
  const spacesNeeded = maxWidth - words.join("").length;
  const spaceCount = words.length - 1;

  if (spaceCount === 0 || isLastLine) {
    return words.join(" ") + " ".repeat(maxWidth - words.join(" ").length);
  } else {
    const spacesPerWord = Math.floor(spacesNeeded / spaceCount);
    const extraSpaces = spacesNeeded % spaceCount;

    let justifiedLine = words[0];

    for (let i = 1; i < words.length; i++) {
      const spacesToAdd = spacesPerWord + (i <= extraSpaces ? 1 : 0);
      justifiedLine += " ".repeat(spacesToAdd) + words[i];
    }

    return justifiedLine;
  }
}

const example1 = ["This", "is", "an", "example", "of", "text", "justification."];
const maxWidth1 = 16;
console.log(fullJustify(example1, maxWidth1));

const example2 = ["What", "must", "be", "acknowledgment", "shall", "be"];
const maxWidth2 = 16;
console.log(fullJustify(example2, maxWidth2));

const example3 = ["Science", "is", "what", "we", "understand", "well", "enough", "to", "explain", "to", "a", "computer.", "Art", "is", "everything", "else", "we", "do"];
const maxWidth3 = 20;
console.log(fullJustify(example3, maxWidth3));
