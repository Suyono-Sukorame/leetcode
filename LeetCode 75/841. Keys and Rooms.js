/**
 * @param {number[][]} rooms
 * @return {boolean}
 */
var canVisitAllRooms = function (rooms) {
  const visited = new Set(); // Set to keep track of visited rooms
  dfs(0); // Start DFS from room 0

  // Check if all rooms were visited
  return visited.size === rooms.length;

  function dfs(room) {
    visited.add(room); // Mark the current room as visited
    for (const key of rooms[room]) {
      if (!visited.has(key)) {
        dfs(key); // Recursively visit the rooms unlocked by the current key
      }
    }
  }
};

// Example usage:
// var rooms1 = [[1],[2],[3],[]];
// console.log(canVisitAllRooms(rooms1)); // Output: true

// var rooms2 = [[1,3],[3,0,1],[2],[0]];
// console.log(canVisitAllRooms(rooms2)); // Output: false
