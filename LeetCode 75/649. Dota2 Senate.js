/**
 * @param {string} senate
 * @return {string}
 */
var predictPartyVictory = function (senate) {
  let senates = senate.split("");
  let delta = 0;

  while (new Set(senates).size > 1) {
    let tmpSenates = [];

    for (let i = 0; i < senates.length; i++) {
      const s = senates[i];
      if (s === "R") {
        if (delta >= 0) {
          tmpSenates.push("R");
        }
        delta += 1;
      } else {
        if (delta <= 0) {
          tmpSenates.push("D");
        }
        delta -= 1;
      }
    }
    senates = tmpSenates;
  }

  return senates[0] === "D" ? "Dire" : "Radiant";
};

// Test cases
console.log(predictPartyVictory("RD")); // Output: "Radiant"
console.log(predictPartyVictory("RDD")); // Output: "Dire"
