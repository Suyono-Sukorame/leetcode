var minDiffInBST = function(root) {
    let prev = null;
    let minDiff = Infinity;
    
    const inorderTraversal = function(node) {
        if (node === null) return;
        
        inorderTraversal(node.left);
        
        if (prev !== null) {
            minDiff = Math.min(minDiff, node.val - prev);
        }
        
        prev = node.val;
        
        inorderTraversal(node.right);
    };
    
    inorderTraversal(root);
    
    return minDiff;
};
