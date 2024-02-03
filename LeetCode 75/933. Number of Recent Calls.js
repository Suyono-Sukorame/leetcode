var RecentCounter = function () {
  this.requestsQueue = [];
};

/**
 * @param {number} t
 * @return {number}
 */
RecentCounter.prototype.ping = function (t) {
  this.requestsQueue.push(t);

  // Remove requests that are outside the time frame [t - 3000, t]
  while (this.requestsQueue[0] < t - 3000) {
    this.requestsQueue.shift();
  }

  return this.requestsQueue.length;
};

/**
 * Your RecentCounter object will be instantiated and called as such:
 * var obj = new RecentCounter()
 * var param_1 = obj.ping(t)
 */

// Example usage:
const recentCounter = new RecentCounter();
console.log(recentCounter.ping(1)); // Output: 1
console.log(recentCounter.ping(100)); // Output: 2
console.log(recentCounter.ping(3001)); // Output: 3
console.log(recentCounter.ping(3002)); // Output: 3
