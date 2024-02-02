/**
 * @param {number[]} nums
 * @return {number[]}
 */
var productExceptSelf = function (n) {
  const result = new Array(n.length).fill(1);
  let r = 1;
  for (let i = n.length - 1; i >= 0; i--) {
    result[i] *= r;
    r *= n[i];
  }
  let l = 1;
  for (let i = 0; i < n.length; i++) {
    result[i] *= l;
    l *= n[i];
  }
  return result;
};
