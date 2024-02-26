var isIdealPermutation = function(nums) {
    const n = nums.length;
    for (let i = 0; i < n; i++) {
        if (Math.abs(nums[i] - i) > 1) {
            return false;
        }
    }
    return true;
};
