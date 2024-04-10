class Solution(object):
    def maxProfit(self, prices):
        left = 0
        profit = 0
        for i in range(1, len(prices)):
            if prices[i] > prices[left]:
                profit = max(profit, prices[i] - prices[left])
            else:
                left = i
        return profit