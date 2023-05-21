<?php

require __DIR__ . '/../vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(require_once __DIR__ . '/routes.php');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Handle 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Handle 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode('@', $handler, 2);
        $controller = new $class();
        $controller->$method($vars);
        break;
}


class HomeController
{
    public function index($vars)
    {
        header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); // Allow the specified HTTP methods
        header('Access-Control-Allow-Headers: *'); // Allow any header

        $host = 'us-cdbr-east-06.cleardb.net'; // Database host
        $dbname = 'heroku_22968bb32d3b037'; // Database name
        $username = 'b7070d63af0c2e'; // Database username
        $password = '3cd4a5e2'; // Database password

        $conn = new mysqli($host, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_POST['item'];

// Retrieve data from the database
        $sql = "SELECT * FROM items2 WHERE item = " . $conn->real_escape_string($id);
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Convert the result set to an array of associative arrays
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            // Encode the data as a JSON string
            $json_data = json_encode($data);

            // Set the content type to JSON and echo the data
            header('Content-Type: application/json');
            echo $json_data;
        } else {
            echo "No results found";
        }

// Close the database connection
        $conn->close();
    }
}

class AboutController
{
    public function index($vars)
    {
        header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); // Allow the specified HTTP methods
        header('Access-Control-Allow-Headers: *'); // Allow any header

        echo "About us!";
    }
}

class ContactController
{
    public function index($vars)
    {
        header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); // Allow the specified HTTP methods
        header('Access-Control-Allow-Headers: *'); // Allow any header

        echo "Contact us!";
    }
}

