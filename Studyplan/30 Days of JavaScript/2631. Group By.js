/**
 * @param {Function} fn
 * @return {Object}
 */
Array.prototype.groupBy = function (fn) {
  const result = {};

  this.forEach((item) => {
    const key = fn(item);
    if (result[key] === undefined) {
      result[key] = [item];
    } else {
      result[key].push(item);
    }
  });

  return result;
};

const array1 = [{ id: "1" }, { id: "1" }, { id: "2" }];

const result1 = array1.groupBy((item) => item.id);
console.log(result1);
// Output: { "1": [{"id": "1"}, {"id": "1"}], "2": [{"id": "2"}] }

const array2 = [
  [1, 2, 3],
  [1, 3, 5],
  [1, 5, 9],
];

const result2 = array2.groupBy((list) => String(list[0]));
console.log(result2);
// Output: { "1": [[1, 2, 3], [1, 3, 5], [1, 5, 9]] }

const array3 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

const result3 = array3.groupBy((n) => String(n > 5));
console.log(result3);
// Output: { "true": [6, 7, 8, 9, 10], "false": [1, 2, 3, 4, 5] }
