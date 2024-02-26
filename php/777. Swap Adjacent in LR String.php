var canTransform = function(start, end) {
    if (start.replace(/X/g, '') !== end.replace(/X/g, '')) {
        return false;
    }
    
    const n = start.length;
    let i = 0, j = 0;
    while (i < n && j < n) {
        while (i < n && start[i] === 'X') {
            i++;
        }
        while (j < n && end[j] === 'X') {
            j++;
        }
        
        if (i === n && j === n) {
            return true;
        }
        
        if (i === n || j === n || start[i] !== end[j]) {
            return false;
        }
        
        if (start[i] === 'R' && i > j) {
            return false;
        }
        
        if (start[i] === 'L' && i < j) {
            return false;
        }
        
        i++;
        j++;
    }
    
    return true;
};
