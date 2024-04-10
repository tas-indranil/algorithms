from icecream import ic

class Solution:
    def containsDuplicate(self, nums):
        num_set = set()
        for num in nums:
            ic(num)
            if num in num_set:
                return True
            else:
                num_set.add(num)
        return False

# Example usage:
solution = Solution()
nums = [1, 2, 3, 1]
print(solution.containsDuplicate(nums))  # Output: True
