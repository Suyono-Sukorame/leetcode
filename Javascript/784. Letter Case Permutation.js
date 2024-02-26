var letterCasePermutation = function (s) {
  const permutations = [];

  const backtrack = (index, currentPerm) => {
    if (index === s.length) {
      permutations.push(currentPerm);
      return;
    }

    if (s[index].match(/[a-zA-Z]/)) {
      backtrack(index + 1, currentPerm + s[index].toLowerCase());
      backtrack(index + 1, currentPerm + s[index].toUpperCase());
    } else {
      backtrack(index + 1, currentPerm + s[index]);
    }
  };

  backtrack(0, "");

  return permutations;
};
