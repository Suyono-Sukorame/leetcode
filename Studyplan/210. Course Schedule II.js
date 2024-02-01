/**
 * @param {number} numCourses
 * @param {number[][]} prerequisites
 * @return {number[]}
 */
var findOrder = function (numCourses, prerequisites) {
  const graph = new Map();
  const inDegrees = new Array(numCourses).fill(0);

  // Build the graph and calculate in-degrees
  for (const [course, prereq] of prerequisites) {
    if (!graph.has(prereq)) {
      graph.set(prereq, []);
    }
    graph.get(prereq).push(course);
    inDegrees[course]++;
  }

  // Initialize a queue with courses that have in-degree of 0
  const queue = [];
  for (let i = 0; i < numCourses; i++) {
    if (inDegrees[i] === 0) {
      queue.push(i);
    }
  }

  const result = [];
  while (queue.length > 0) {
    const course = queue.shift();
    result.push(course);

    if (graph.has(course)) {
      for (const neighbor of graph.get(course)) {
        inDegrees[neighbor]--;

        if (inDegrees[neighbor] === 0) {
          queue.push(neighbor);
        }
      }
    }
  }

  // Check if all courses are taken
  return result.length === numCourses ? result : [];
};

// Example usage:
console.log(findOrder(2, [[1, 0]])); // Output: [0, 1]
console.log(
  findOrder(4, [
    [1, 0],
    [2, 0],
    [3, 1],
    [3, 2],
  ])
); // Output: [0, 1, 2, 3]
console.log(findOrder(1, [])); // Output: [0]
