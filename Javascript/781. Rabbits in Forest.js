var numRabbits = function(answers) {
    const count = new Map();
    
    for (const ans of answers) {
        count.set(ans, (count.get(ans) || 0) + 1);
    }
    
    let minRabbits = 0;
    
    for (const [ans, cnt] of count.entries()) {
        minRabbits += Math.ceil(cnt / (ans + 1)) * (ans + 1);
    }
    
    return minRabbits;
};
