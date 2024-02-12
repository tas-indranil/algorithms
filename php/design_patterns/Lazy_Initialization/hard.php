<?php
class ConfigurationManager
{
    private $settings;
    private $loaded = false;

    public function getSettings($name)
    {
        if(!$this->loaded)
        {
            $this->loadSettings();
        }
        return $this->settings[$name] ?? null;
    }

    private function loadSettings()
    {
        // Simulate loading settings from a file or database
        $this->settings = [
            'app_name' => 'MyApp',
            'debug_mode' => false,
            'database_host' => 'localhost',
            'database_name' => 'my_database',
            // More settings...
        ];
        $this->loaded = true;
    }
}

$config = new ConfigurationManager();
echo $config->getSettings("app_name");
echo "\n";
// Get another setting
echo $config->getSettings('database_host'); // Settings are already loaded, no additional loading