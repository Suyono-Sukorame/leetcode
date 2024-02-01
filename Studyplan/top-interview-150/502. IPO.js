/**
 * @param {number} k
 * @param {number} w
 * @param {number[]} profits
 * @param {number[]} capital
 * @return {number}
 */
var findMaximizedCapital = function (k, w, profits, capital) {
  const n = profits.length;
  const projects = [];

  for (let i = 0; i < n; i++) {
    projects.push({ profit: profits[i], capital: capital[i] });
  }

  projects.sort((a, b) => a.capital - b.capital);

  const maxHeap = new MaxHeap();

  let availableCapital = w;
  let currentIndex = 0;

  for (let i = 0; i < k; i++) {
    while (currentIndex < n && projects[currentIndex].capital <= availableCapital) {
      maxHeap.insert(projects[currentIndex].profit);
      currentIndex++;
    }

    if (maxHeap.isEmpty()) {
      break;
    }

    availableCapital += maxHeap.extractMax();
  }

  return availableCapital;
};

class MaxHeap {
  constructor() {
    this.heap = [];
  }

  insert(value) {
    this.heap.push(value);
    this.heapifyUp();
  }

  extractMax() {
    if (this.heap.length === 0) {
      return null;
    }

    if (this.heap.length === 1) {
      return this.heap.pop();
    }

    [this.heap[0], this.heap[this.heap.length - 1]] = [this.heap[this.heap.length - 1], this.heap[0]];

    const max = this.heap.pop();

    this.heapifyDown();

    return max;
  }

  isEmpty() {
    return this.heap.length === 0;
  }

  heapifyUp() {
    let currentIndex = this.heap.length - 1;

    while (currentIndex > 0) {
      const parentIndex = Math.floor((currentIndex - 1) / 2);

      if (this.heap[currentIndex] > this.heap[parentIndex]) {
        [this.heap[currentIndex], this.heap[parentIndex]] = [this.heap[parentIndex], this.heap[currentIndex]];
        currentIndex = parentIndex;
      } else {
        break;
      }
    }
  }

  heapifyDown() {
    let currentIndex = 0;

    while (true) {
      let leftChildIndex = 2 * currentIndex + 1;
      let rightChildIndex = 2 * currentIndex + 2;
      let maxIndex = currentIndex;

      if (leftChildIndex < this.heap.length && this.heap[leftChildIndex] > this.heap[maxIndex]) {
        maxIndex = leftChildIndex;
      }

      if (rightChildIndex < this.heap.length && this.heap[rightChildIndex] > this.heap[maxIndex]) {
        maxIndex = rightChildIndex;
      }

      if (currentIndex !== maxIndex) {
        [this.heap[currentIndex], this.heap[maxIndex]] = [this.heap[maxIndex], this.heap[currentIndex]];
        currentIndex = maxIndex;
      } else {
        break;
      }
    }
  }
}
