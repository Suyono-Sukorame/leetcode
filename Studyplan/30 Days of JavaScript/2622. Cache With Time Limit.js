var TimeLimitedCache = function () {
  this.cache = new Map();
};

TimeLimitedCache.prototype.set = function (key, value, duration) {
  const currentTime = Date.now();
  const expirationTime = currentTime + duration;

  if (this.cache.has(key)) {
    const existingEntry = this.cache.get(key);
    if (existingEntry.expirationTime > currentTime) {
      existingEntry.value = value;
      existingEntry.expirationTime = expirationTime;
      return true;
    }
  }

  this.cache.set(key, { value, expirationTime });
  return false;
};

TimeLimitedCache.prototype.get = function (key) {
  const currentTime = Date.now();

  if (this.cache.has(key)) {
    const entry = this.cache.get(key);
    if (entry.expirationTime > currentTime) {
      return entry.value;
    } else {
      this.cache.delete(key);
    }
  }

  return -1;
};

TimeLimitedCache.prototype.count = function () {
  const currentTime = Date.now();
  let count = 0;

  for (const [key, entry] of this.cache) {
    if (entry.expirationTime > currentTime) {
      count++;
    } else {
      this.cache.delete(key);
    }
  }

  return count;
};

const timeLimitedCache = new TimeLimitedCache();
console.log(timeLimitedCache.set(1, 42, 100)); // false
console.log(timeLimitedCache.get(1)); // 42
console.log(timeLimitedCache.count()); // 1
