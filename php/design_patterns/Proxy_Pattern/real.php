<?php
interface DataFetcher
{
    public function fetchData(): string;
}

class RealDataFetcher implements DataFetcher
{
    public function fetchData(): string
    {
        // Simulate fetching data from a remote API
        sleep(2); // Simulate delay
        return "Data fetched from remote API";
    }
}

// Proxy
class DataFetcherProxy implements DataFetcher
{
    private $realDataFetcher;
    private $cache;

    public function __construct()
    {
        $this->realDataFetcher = new RealDataFetcher();
    }

    public function fetchData(): string
    {
        if($this->cache === null)
        {
            // If data is not cached, fetch it from the real subject
            $this->cache = $this->realDataFetcher->fetchData();
        }
        return $this->cache;
    }
}

$proxy = new DataFetcherProxy();

// Fetch data using proxy (first call)
$start = microtime(true);
$data = $proxy->fetchData();
$end = microtime(true);
echo "Data fetched: $data\n";
echo "Time taken: " . ($end - $start) . " seconds\n";

// Fetch data using proxy (second call)
$start = microtime(true);
$data = $proxy->fetchData();
$end = microtime(true);
echo "Data fetched: $data\n";
echo "Time taken: " . ($end - $start) . " seconds\n";