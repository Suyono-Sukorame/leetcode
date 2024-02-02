/**
 * @param {Object|Array} obj
 * @return {Object|Array}
 */
var compactObject = function (obj) {
  if (Array.isArray(obj)) {
    return obj.filter((value) => Boolean(value)).map(compactObject);
  } else if (typeof obj === "object" && obj !== null) {
    const result = {};
    for (const key in obj) {
      const compactedValue = compactObject(obj[key]);
      if (Boolean(compactedValue)) {
        result[key] = compactedValue;
      }
    }
    return result;
  } else {
    return obj;
  }
};

const example1 = [null, 0, false, 1];
console.log(compactObject(example1));
// Output: [1]

const example2 = { a: null, b: [false, 1] };
console.log(compactObject(example2));
// Output: {"b": [1]}

const example3 = [null, 0, 5, [0], [false, 16]];
console.log(compactObject(example3));
// Output: [5, [], [16]]
