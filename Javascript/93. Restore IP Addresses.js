/**
 * @param {string} s
 * @return {string[]}
 */
var restoreIpAddresses = function (s) {
  const result = [];
  backtrack(0, [], s, result);
  return result;
};

function backtrack(start, current, s, result) {
  if (start === s.length && current.length === 4) {
    result.push(current.join("."));
    return;
  }

  for (let i = 1; i <= 3; i++) {
    const end = start + i;
    if (end > s.length) {
      break;
    }

    const segment = s.substring(start, end);
    if (isValidSegment(segment)) {
      current.push(segment);
      backtrack(end, current, s, result);
      current.pop();
    }
  }
}

function isValidSegment(segment) {
  if (segment.length > 1 && segment[0] === "0") {
    return false;
  }

  const num = parseInt(segment);
  return num >= 0 && num <= 255;
}

const s1 = "25525511135";
console.log(restoreIpAddresses(s1)); // Output: ["255.255.11.135","255.255.111.35"]

const s2 = "0000";
console.log(restoreIpAddresses(s2)); // Output: ["0.0.0.0"]

const s3 = "101023";
console.log(restoreIpAddresses(s3)); // Output: ["1.0.10.23","1.0.102.3","10.1.0.23","10.10.2.3","101.0.2.3"]
