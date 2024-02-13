<?php

// Handler Interface
interface Handler {
    public function handleRequest($request);
}

// Authentication Handler
class AuthenticationHandler implements Handler {
    public function handleRequest($request) {
        // Check if the request requires authentication
        if ($request->needsAuthentication()) {
            // Authenticate the request
            if (!$this->authenticate($request)) {
                return "Authentication failed!";
            }
        }
        // Pass the request to the next handler
        return $this->nextHandler($request);
    }

    private function authenticate($request) {
        // Authenticate the request
        // Logic for authentication
        return true; // Return true for demo purposes
    }

    private function nextHandler($request) {
        // Pass the request to the next handler in the chain
        return (new AuthorizationHandler())->handleRequest($request);
    }
}

// Authorization Handler
class AuthorizationHandler implements Handler {
    public function handleRequest($request) {
        // Check if the request requires authorization
        if ($request->needsAuthorization()) {
            // Authorize the request
            if (!$this->authorize($request)) {
                return "Authorization failed!";
            }
        }
        // Pass the request to the next handler
        return $this->nextHandler($request);
    }

    private function authorize($request) {
        // Authorize the request
        // Logic for authorization
        return true; // Return true for demo purposes
    }

    private function nextHandler($request) {
        // Pass the request to the next handler in the chain
        return (new ValidationHandler())->handleRequest($request);
    }
}

// Validation Handler
class ValidationHandler implements Handler {
    public function handleRequest($request) {
        // Validate the request
        if (!$this->validate($request)) {
            return "Request validation failed!";
        }
        // Process the request
        return "Request processed successfully!";
    }

    private function validate($request) {
        // Validate the request
        // Logic for validation
        return true; // Return true for demo purposes
    }
}

class Client {
    public function sendRequest($request) {
        // Create the handler chain
        $handler = new AuthenticationHandler();
        // Send the request to the first handler in the chain
        return $handler->handleRequest($request);
    }
}


class Request {
    public function needsAuthentication() {
        // Logic to check if the request requires authentication
        return true;
    }

    public function needsAuthorization() {
        // Logic to check if the request requires authorization
        return true;
    }
}

// Usage
$request = new Request();
$client = new Client();
echo $client->sendRequest($request); // Output: Request processed successfully!

