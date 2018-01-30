<?php
namespace NthPrime\App;

class App
{

    public function __construct()
    {
        $this->setupAutoload();
    }

    public function run()
    {
        $requestURI = \explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = \explode('/', $_SERVER['SCRIPT_NAME']);

        // nem kellaz index.php a requestURIba ha van.
        for ($i= 0; $i < count($scriptName); $i++) {
            if ($requestURI[$i] === $scriptName[$i]) {
                unset($requestURI[$i]);
            }
        }
        $command = \array_values($requestURI);
        \var_dump($command);

        switch ($command[0]) {
            case "":
                echo "index";
                break;
            case "log":
                echo "log";
                break;
            case "prime":
                echo "prime";
                break;
            default:
                echo "404";
                break;
        }
    }

    protected function setupAutoload()
    {
        \spl_autoload_register(function ($class) {
            $prefix = "NthPrime\\App\\";
            $baseDir = __DIR__ . "/";
            $len = \strlen($prefix);
            if (\strncmp($prefix, $class, $len) !== 0) {
                //not my namespace ignore
                return;
            }
            $relativeClass = \substr($class, $len);
            $file = $baseDir . \str_replace("\\", "/", $relativeClass) . ".php";
            if (\file_exists($file)) {
                require $file;
            }
        });
    }
}
