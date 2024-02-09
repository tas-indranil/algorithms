import os

values = [6, -1, 1, 11, 5, -4, 8, 3]
values2 = [3, 5, -4, 8, 11, 1, -1, 6]
desired_value = 13

values.sort(reverse=False)

# def two_number_sum(array, desired_value):
#     """
#     Process one
#     This is where we are comparing both right and left value to the desired number
#     :param array:
#     :param desired_value:
#     :return:
#     """
#     for l_value in array:
#         for r_value in array:
#             if l_value + r_value == desired_value and l_value != r_value:
#                 return f"{l_value} and {r_value} equals {desired_value}"
#     return "Not matching"

# -----------------------------------------------------------------------------------------------------------------------

# def two_number_sum(array, targetSum):
#     for i in range(len(array) - 1):
#         firstNum = array[i]
#         for j in range(i + 1, len(array)):
#             secondNum = array[j]
#             if firstNum + secondNum == targetSum:
#                 return [firstNum, secondNum]
#     return []

# -----------------------------------------------------------------------------------------------------------------------

# def two_number_sum(array, desiredValue):
#     """
#     We are using a hash table to speed up the process. This will run O(n) | O(n) space
#     :param array:
#     :param desiredValue:
#     :return:
#     """
#     nums = {}
#     for num in array:
#         potentialMatch = desiredValue - num
#         if potentialMatch in nums:
#             return [desiredValue - num, num]
#         else:
#             nums[num] = True
#     return []

"""
# O(nLog(n)) | O(n) space
def two_number_sum(array, desiredValue):
    array.sort()
    left = 0
    right = len(array) - 1
    while left < right:
        currentSum = array[left] + array[right]
        if currentSum == desiredValue:
            return [array[left], array[right]]
        elif currentSum < desiredValue:
            left += 1
        elif currentSum > desiredValue:
            right -= 1
    return []
"""

print(two_number_sum(values2, desired_value))
