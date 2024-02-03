/**
 * @param {number[]} asteroids
 * @return {number[]}
 */
var asteroidCollision = function (asteroids) {
  const stack = [];

  for (const asteroid of asteroids) {
    handleCollision(stack, asteroid);
  }

  return stack;
};

function handleCollision(stack, asteroid) {
  if (stack.length === 0 || asteroid > 0) {
    // Asteroid moving right or stack is empty
    stack.push(asteroid);
  } else {
    // Asteroid moving left
    while (stack.length > 0 && stack[stack.length - 1] > 0) {
      const prevAsteroid = stack.pop();
      if (prevAsteroid === -asteroid) {
        // Both asteroids explode
        return;
      } else if (prevAsteroid > -asteroid) {
        // Current asteroid explodes
        stack.push(prevAsteroid);
        return;
      }
    }

    // If stack is empty or the remaining asteroids are all moving left
    stack.push(asteroid);
  }
}

// Test cases
console.log(asteroidCollision([5, 10, -5])); // Output: [5, 10]
console.log(asteroidCollision([8, -8])); // Output: []
console.log(asteroidCollision([10, 2, -5])); // Output: [10]
