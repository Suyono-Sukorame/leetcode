/**
 * @param {string[][]} equations
 * @param {number[]} values
 * @param {string[][]} queries
 * @return {number[]}
 */
var calcEquation = function (equations, values, queries) {
  // Build the graph
  const graph = new Map();

  for (let i = 0; i < equations.length; i++) {
    const [a, b] = equations[i];
    const value = values[i];

    if (!graph.has(a)) {
      graph.set(a, []);
    }

    if (!graph.has(b)) {
      graph.set(b, []);
    }

    graph.get(a).push({ node: b, value });
    graph.get(b).push({ node: a, value: 1 / value });
  }

  const result = [];

  // DFS function to find division results
  const dfs = (start, end, visited) => {
    if (!graph.has(start)) {
      return -1;
    }

    if (start === end) {
      return 1;
    }

    visited.add(start);

    const neighbors = graph.get(start);

    for (const neighbor of neighbors) {
      if (!visited.has(neighbor.node)) {
        const subResult = dfs(neighbor.node, end, visited);

        if (subResult !== -1) {
          return subResult * neighbor.value;
        }
      }
    }

    return -1;
  };

  // Perform DFS for each query
  for (const query of queries) {
    const [start, end] = query;
    const visited = new Set();
    const queryResult = dfs(start, end, visited);

    result.push(queryResult);
  }

  return result;
};

// Example usage:
const equations1 = [
  ["a", "b"],
  ["b", "c"],
];
const values1 = [2.0, 3.0];
const queries1 = [
  ["a", "c"],
  ["b", "a"],
  ["a", "e"],
  ["a", "a"],
  ["x", "x"],
];
console.log(calcEquation(equations1, values1, queries1));
// Output: [6.0, 0.5, -1.0, 1.0, -1.0]

const equations2 = [
  ["a", "b"],
  ["b", "c"],
  ["bc", "cd"],
];
const values2 = [1.5, 2.5, 5.0];
const queries2 = [
  ["a", "c"],
  ["c", "b"],
  ["bc", "cd"],
  ["cd", "bc"],
];
console.log(calcEquation(equations2, values2, queries2));
// Output: [3.75, 0.4, 5.0, 0.2]

const equations3 = [["a", "b"]];
const values3 = [0.5];
const queries3 = [
  ["a", "b"],
  ["b", "a"],
  ["a", "c"],
  ["x", "y"],
];
console.log(calcEquation(equations3, values3, queries3));
// Output: [0.5, 2.0, -1.0, -1.0]
