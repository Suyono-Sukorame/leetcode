/**
 * @param {Array} arr1
 * @param {Array} arr2
 * @return {Array}
 */
var join = function (arr1, arr2) {
  const idSet = new Set();
  const resultMap = new Map();

  // Add unique ids from arr1 to idSet and resultMap
  for (const obj of arr1) {
    idSet.add(obj.id);
    resultMap.set(obj.id, { ...obj });
  }

  // Merge arr2 objects into resultMap
  for (const obj of arr2) {
    if (idSet.has(obj.id)) {
      // Merge with existing object
      resultMap.set(obj.id, { ...resultMap.get(obj.id), ...obj });
    } else {
      // Add new object
      idSet.add(obj.id);
      resultMap.set(obj.id, { ...obj });
    }
  }

  // Convert resultMap values to array and sort by id
  const joinedArray = Array.from(resultMap.values()).sort((a, b) => a.id - b.id);

  return joinedArray;
};

const example1Arr1 = [
  { id: 1, x: 1 },
  { id: 2, x: 9 },
];
const example1Arr2 = [{ id: 3, x: 5 }];
const result1 = join(example1Arr1, example1Arr2);
console.log(result1);
// Output: [{"id": 1, "x": 1}, {"id": 2, "x": 9}, {"id": 3, "x": 5}]

const example2Arr1 = [
  { id: 1, x: 2, y: 3 },
  { id: 2, x: 3, y: 6 },
];
const example2Arr2 = [
  { id: 2, x: 10, y: 20 },
  { id: 3, x: 0, y: 0 },
];
const result2 = join(example2Arr1, example2Arr2);
console.log(result2);
// Output: [{"id": 1, "x": 2, "y": 3}, {"id": 2, "x": 10, "y": 20}, {"id": 3, "x": 0, "y": 0}]

const example3Arr1 = [{ id: 1, b: { b: 94 }, v: [4, 3], y: 48 }];
const example3Arr2 = [{ id: 1, b: { c: 84 }, v: [1, 3] }];
const result3 = join(example3Arr1, example3Arr2);
console.log(result3);
// Output: [{"id": 1, "b": {"c": 84}, "v": [1, 3], "y": 48}]
