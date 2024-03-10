var subarraysWithKDistinct = function(nums, k) {
    function atMostK(nums, k) {
        const n = nums.length;
        let left = 0;
        let count = 0;
        const freq = new Array(n + 1).fill(0);
        let distinct = 0;

        for (let right = 0; right < n; right++) {
            if (freq[nums[right]] === 0) {
                distinct++;
            }
            freq[nums[right]]++;

            while (distinct > k) {
                freq[nums[left]]--;
                if (freq[nums[left]] === 0) {
                    distinct--;
                }
                left++;
            }
            count += right - left + 1;
        }
        return count;
    }

    return atMostK(nums, k) - atMostK(nums, k - 1);
};
