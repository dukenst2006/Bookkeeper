<?php


namespace Bookkeeper\Support\Currencies;


use Bookkeeper\Finance\Account;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class Cruncher {

    /**
     * Crunches transactions for given transactions
     *
     * @param Collection $transactions
     * @param Carbon $start
     * @param Carbon $end
     * @return array
     */
    public function compileStatisticsFor(Collection $transactions, Carbon $start, Carbon $end)
    {
        $statistics = $this->getNewBaseForInterval($start, $end);

        $accounts = $transactions->groupBy('account_id');

        foreach ($accounts as $accountId => $transactions)
        {
            $rate = app('bookkeeper.support.currency')->getRateFor($accountId);

            $statistics = $this->mergeTransactionsWith($transactions, $statistics, $rate);
        }

        $summary = $this->generateSummary($statistics, get_default_account());
        $statistics = $this->normalizeStatistics($statistics, get_default_account());

        return array_merge($summary, $statistics);
    }

    /**
     * Crunches transactions for an account
     *
     * @param Collection $transactions
     * @param Account $account
     * @param Carbon $start
     * @param Carbon $end
     * @return array
     */
    public function compileAccountStatisticsFor(Collection $transactions, Account $account, Carbon $start, Carbon $end)
    {
        $statistics = $this->getNewBaseForInterval($start, $end);

        $statistics = $this->mergeTransactionsWith($transactions, $statistics, 1);

        $summary = $this->generateSummary($statistics, $account->getKey());
        $statistics = $this->normalizeStatistics($statistics, $account->getKey());

        return array_merge($summary, $statistics);
    }

    /**
     * Generates base template for statistics with given interval
     *
     * @param Carbon $start
     * @param Carbon $end
     * @return array
     */
    protected function getNewBaseForInterval(Carbon $start, Carbon $end)
    {
        $months = [];

        while ($start->lt($end))
        {
            $months[$start->month] = 0;
            $start->addMonth();
        }

        return [
            'income'  => $months,
            'expense' => $months
        ];
    }

    /**
     * Merges statistics with with new transactions
     *
     * @param Collection $transactions
     * @param array $statistics
     * @param float $rate
     * @return array
     */
    protected function mergeTransactionsWith(Collection $transactions, array $statistics, $rate)
    {
        foreach ($transactions as $transaction)
        {
            $statistics[$transaction->type][$transaction->created_at->month] +=  intval($transaction->amount)/$rate;
        }

        return $statistics;
    }

    /**
     * Generates summary for the statistics
     *
     * @param array $statistics
     * @param int $accountId
     * @return array
     */
    protected function generateSummary(array $statistics, $accountId)
    {
        $totalIncome = array_sum($statistics['income']);
        $totalExpense = array_sum($statistics['expense']);
        $profit = $totalIncome - $totalExpense;

        return [
            'total_income'  => currency_string_for(floor($totalIncome), $accountId),
            'total_expense' => currency_string_for(floor($totalExpense), $accountId),
            'profit'        => currency_string_for(floor($profit), $accountId),
        ];
    }

    /**
     * Normalizes statistics while turning them into currency strings
     *
     * @param array $statistics
     * @param int $accountId
     * @return array
     */
    protected function normalizeStatistics(array $statistics, $accountId)
    {
        foreach ($statistics as $category => $months)
        {
            foreach ($months as $month => $value)
            {
                $statistics[$category][$month] = currency_string_for(floor($value), $accountId);
            }
        }

        return $statistics;
    }

}