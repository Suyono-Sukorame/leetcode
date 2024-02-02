/**
 * @param {number[]} arr
 * @return {boolean}
 */
var uniqueOccurrences = function (arr) {
  const frequencyMap = new Map();

  // Count the occurrences of each element in arr.
  for (let num of arr) {
    frequencyMap.set(num, (frequencyMap.get(num) || 0) + 1);
  }

  const occurrenceSet = new Set();

  // Check if the number of occurrences is unique.
  for (let count of frequencyMap.values()) {
    if (occurrenceSet.has(count)) {
      return false;
    }
    occurrenceSet.add(count);
  }

  return true;
};
