/**
 * @param {number[]} piles
 * @param {number} h
 * @return {number}
 */
var minEatingSpeed = function (piles, h) {
  let left = 1;
  let right = Math.max(...piles);

  while (left < right) {
    let mid = Math.floor((left + right) / 2);

    if (canEatAll(piles, h, mid)) {
      right = mid;
    } else {
      left = mid + 1;
    }
  }

  return left;
};

function canEatAll(piles, h, speed) {
  let hoursNeeded = 0;

  for (let pile of piles) {
    hoursNeeded += Math.ceil(pile / speed);
  }

  return hoursNeeded <= h;
}
