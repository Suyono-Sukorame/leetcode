var brokenCalc = function(startValue, target) {
    let operations = 0;
    
    while (target > startValue) {
        if (target % 2 === 0) {
            target /= 2;
        } else {
            target++;
        }
        operations++;
    }
    
    return operations + startValue - target;
};
