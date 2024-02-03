class SmallestInfiniteSet {
  constructor() {
    this.count = Array(1002).fill(1);
    this.popIndex = 1;
  }

  popSmallest() {
    this.count[this.popIndex] -= 1;
    const ans = this.popIndex;

    for (let i = this.popIndex + 1; i <= 1000; i++) {
      if (this.count[i] !== 0) {
        this.popIndex = i;
        break;
      }
    }

    return ans;
  }

  addBack(num) {
    if (this.count[num] !== 0) return;
    this.count[num] += 1;

    if (num < this.popIndex) {
      this.popIndex = num;
    }
  }
}

// Example usage
const obj = new SmallestInfiniteSet();
console.log(obj.popSmallest()); // 1
obj.addBack(2);
console.log(obj.popSmallest()); // 1
console.log(obj.popSmallest()); // 2
console.log(obj.popSmallest()); // 3
obj.addBack(1);
console.log(obj.popSmallest()); // 1
console.log(obj.popSmallest()); // 4
console.log(obj.popSmallest()); // 5
