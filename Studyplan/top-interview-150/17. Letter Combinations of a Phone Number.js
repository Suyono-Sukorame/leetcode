/**
 * @param {string} digits
 * @return {string[]}
 */
var letterCombinations = function (digits) {
  if (digits.length === 0) {
    return [];
  }

  const digitMap = {
    2: "abc",
    3: "def",
    4: "ghi",
    5: "jkl",
    6: "mno",
    7: "pqrs",
    8: "tuv",
    9: "wxyz",
  };

  const result = [""];

  for (const digit of digits) {
    const currentDigitLetters = digitMap[digit];
    const newCombinations = [];

    for (const combination of result) {
      for (const letter of currentDigitLetters) {
        newCombinations.push(combination + letter);
      }
    }

    result.length = 0;
    result.push(...newCombinations);
  }

  return result;
};

console.log(letterCombinations("23"));
console.log(letterCombinations(""));
console.log(letterCombinations("2"));
