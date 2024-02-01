/**
 * Definition for a Node.
 */
function Node(val, neighbors) {
  this.val = val === undefined ? 0 : val;
  this.neighbors = neighbors === undefined ? [] : neighbors;
}

/**
 * @param {Node} node
 * @return {Node}
 */
var cloneGraph = function (node) {
  if (!node) {
    return null;
  }

  const visited = new Map();

  const dfs = (current) => {
    if (visited.has(current)) {
      return visited.get(current);
    }

    const clonedNode = new Node(current.val);
    visited.set(current, clonedNode);

    for (const neighbor of current.neighbors) {
      clonedNode.neighbors.push(dfs(neighbor));
    }

    return clonedNode;
  };

  return dfs(node);
};
