/**
 * @param {number} n
 * @param {number[][]} connections
 * @return {number}
 */
var minReorder = function (n, connections) {
  const graph = Array.from({ length: n }, () => []);
  const visited = new Set();
  let count = 0;

  // Build the graph
  for (const [from, to] of connections) {
    graph[from].push([to, 1]); // 1 indicates the direction from 'from' to 'to'
    graph[to].push([from, 0]); // 0 indicates the opposite direction
  }

  // Perform DFS to count the edges that need to be reversed
  dfs(0);

  return count;

  function dfs(node) {
    visited.add(node);
    for (const [neighbor, direction] of graph[node]) {
      if (!visited.has(neighbor)) {
        count += direction; // Count edges that need to be reversed
        dfs(neighbor);
      }
    }
  }
};

// Example usage:
// var n1 = 6, connections1 = [[0,1],[1,3],[2,3],[4,0],[4,5]];
// console.log(minReorder(n1, connections1)); // Output: 3

// var n2 = 5, connections2 = [[1,0],[1,2],[3,2],[3,4]];
// console.log(minReorder(n2, connections2)); // Output: 2

// var n3 = 3, connections3 = [[1,0],[2,0]];
// console.log(minReorder(n3, connections3)); // Output: 0
