/**
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @param {number} k
 * @return {number[][]}
 */
var kSmallestPairs = function (nums1, nums2, k) {
  if (!nums1.length || !nums2.length || k <= 0) {
    return [];
  }

  const result = [];
  const minHeap = new MinHeap();

  for (let i = 0; i < Math.min(nums1.length, k); i++) {
    minHeap.insert([nums1[i], nums2[0], 0]);
  }

  while (k > 0 && !minHeap.isEmpty()) {
    const pair = minHeap.extractMin();
    const [num1, num2, index] = pair;
    result.push([num1, num2]);

    if (index + 1 < nums2.length) {
      minHeap.insert([num1, nums2[index + 1], index + 1]);
    }

    k--;
  }

  return result;
};

class MinHeap {
  constructor() {
    this.heap = [];
  }

  insert(value) {
    this.heap.push(value);
    this.heapifyUp();
  }

  extractMin() {
    if (this.heap.length === 0) {
      return null;
    }

    if (this.heap.length === 1) {
      return this.heap.pop();
    }

    [this.heap[0], this.heap[this.heap.length - 1]] = [this.heap[this.heap.length - 1], this.heap[0]];

    const min = this.heap.pop();

    this.heapifyDown();

    return min;
  }

  isEmpty() {
    return this.heap.length === 0;
  }

  heapifyUp() {
    let currentIndex = this.heap.length - 1;

    while (currentIndex > 0) {
      const parentIndex = Math.floor((currentIndex - 1) / 2);

      if (this.heap[currentIndex][0] + this.heap[currentIndex][1] < this.heap[parentIndex][0] + this.heap[parentIndex][1]) {
        [this.heap[currentIndex], this.heap[parentIndex]] = [this.heap[parentIndex], this.heap[currentIndex]];
        currentIndex = parentIndex;
      } else {
        break; // Heap property terpenuhi
      }
    }
  }

  heapifyDown() {
    let currentIndex = 0;

    while (true) {
      let leftChildIndex = 2 * currentIndex + 1;
      let rightChildIndex = 2 * currentIndex + 2;
      let minIndex = currentIndex;

      if (leftChildIndex < this.heap.length && this.heap[leftChildIndex][0] + this.heap[leftChildIndex][1] < this.heap[minIndex][0] + this.heap[minIndex][1]) {
        minIndex = leftChildIndex;
      }

      if (rightChildIndex < this.heap.length && this.heap[rightChildIndex][0] + this.heap[rightChildIndex][1] < this.heap[minIndex][0] + this.heap[minIndex][1]) {
        minIndex = rightChildIndex;
      }

      if (currentIndex !== minIndex) {
        [this.heap[currentIndex], this.heap[minIndex]] = [this.heap[minIndex], this.heap[currentIndex]];
        currentIndex = minIndex;
      } else {
        break; // Heap property terpenuhi
      }
    }
  }
}
