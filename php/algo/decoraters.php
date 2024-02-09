<?php

// decorator function
function uppercaseDecorater(callable $function)
{
	return function ($name) use ($function){		
		echo"\n";
		$result =  $function($name);
		return strtoupper($result);
	};
}

// original function
function greet($name)
{
	return "Hello, ". $name;
}

// Decorating greet function
$decorateGreet = uppercaseDecorater('greet');

// Calling the decorated function
echo $decorateGreet('mark');

