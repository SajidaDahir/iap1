<?php
//create a class Hello World
class HelloWorld {
    public function greet(){
        return "<h1>Hello, ICS Community!</h1>";

    }
    public function today(){
        return "<p>Today is" . date("l") . "</p>";
    }
}

//create  instance of Helloworld
$hello = new HelloWorld();

//call the greet method
print $hello->greet();

//call the today method
print $hello->today();
?>