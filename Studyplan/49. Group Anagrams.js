/**
 * @param {string[]} strs
 * @return {string[][]}
 */
var groupAnagrams = function (strs) {
  const anagramGroups = new Map();

  for (const str of strs) {
    const sortedStr = str.split("").sort().join("");

    if (!anagramGroups.has(sortedStr)) {
      anagramGroups.set(sortedStr, []);
    }

    anagramGroups.get(sortedStr).push(str);
  }

  return Array.from(anagramGroups.values());
};

console.log(groupAnagrams(["eat", "tea", "tan", "ate", "nat", "bat"]));
// Output: [["bat"],["nat","tan"],["ate","eat","tea"]]

console.log(groupAnagrams([""]));
// Output: [[""]]

console.log(groupAnagrams(["a"]));
// Output: [["a"]]
