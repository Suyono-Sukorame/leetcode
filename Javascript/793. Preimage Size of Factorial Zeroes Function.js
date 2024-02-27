var preimageSizeFZF = function (K) {
  const checkEndZeroCount = function (n) {
    let count = 0;
    let div = 5;
    while (Math.floor(n / div) > 0) {
      count += Math.floor(n / div);
      div *= 5;
    }
    return count;
  };

  let left = 0;
  let right = Number.MAX_SAFE_INTEGER;

  while (left <= right) {
    let mid = left + Math.floor((right - left) / 2);
    let x = checkEndZeroCount(mid);

    if (K === x) return 5;
    if (x > K) right = mid - 1;
    else left = mid + 1;
  }
  return 0;
};
