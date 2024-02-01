/**
 * @param {number} numCourses
 * @param {number[][]} prerequisites
 * @return {boolean}
 */
var canFinish = function (numCourses, prerequisites) {
  // Build a graph to represent the courses and their prerequisites
  const graph = new Map();
  const visited = new Array(numCourses).fill(0); // 0: unvisited, 1: visiting, 2: visited

  for (const [course, prereq] of prerequisites) {
    if (!graph.has(course)) {
      graph.set(course, []);
    }
    graph.get(course).push(prereq);
  }

  // DFS to check for cycles in the graph
  const hasCycle = (course) => {
    if (visited[course] === 1) {
      return true; // Cycle detected
    }

    if (visited[course] === 2) {
      return false; // Already visited, no cycle
    }

    visited[course] = 1; // Mark as visiting

    if (graph.has(course)) {
      for (const neighbor of graph.get(course)) {
        if (hasCycle(neighbor)) {
          return true;
        }
      }
    }

    visited[course] = 2; // Mark as visited
    return false;
  };

  // Check for cycles in the graph
  for (let course = 0; course < numCourses; course++) {
    if (visited[course] === 0 && hasCycle(course)) {
      return false; // Cycle detected, cannot finish all courses
    }
  }

  return true; // No cycles, can finish all courses
};

// Example usage:
console.log(canFinish(2, [[1, 0]])); // Output: true
console.log(
  canFinish(2, [
    [1, 0],
    [0, 1],
  ])
); // Output: false
