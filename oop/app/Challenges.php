<?php
namespace App;

class Challenges
{
    public function start()
    {
        echo "\nChallenges\n";
        //call the challenges here...
        $this->counter();
        $this->beanCounter();
        $this->shapes();
        $this->extrude();
        // $this->library();
        $this->spoon();
        $this->languages();
    }

    public function counter()
    {
        echo "\n01)\n";

        $counter = new Counter\Counter();
        $counter->increment();
        $counter->increment();
        $counter->increment();

        dump($counter->count()); // 3
    }

    public function beanCounter()
    {
        echo "\n02)\n";

        $counter = new Counter\Counter();
        $beans = new Counter\BeanCounter($counter);
        $beans->addBean()->addBean();

        dump($beans->howMany()); // 2

        // don't worry too much about what this bit of code does
        // you just want it to echo "Not accepted. Good work!"
        // if you try to pass anything other than a Counter to BeanCounter
        try {
            new Counter\BeanCounter(12);
            dump("Accepted. Oops!"); // if you see this, something's not right
        } catch (\TypeError $e) {
            dump("Not accepted. Good work!"); // if you see this, you've done it right
        }
    }

    public function shapes()
    {
        echo "\nInterfaces 01) Shapes\n";

        // create new shapes
        $square = new Shapes\Square(4);
        $circle = new Shapes\Circle(4);
        $rectangle = new Shapes\Rectangle(4, 5);

        // log the areas of each
        dump(
            $square->area(), // 16
            $circle->area(), // 50.265482457437
            $rectangle->area() // 20
        );
    }

    public function extrude()
    {
        echo "\nInterfaces 02) Extrude\n";

        // create 2D objects
        $square = new Shapes\Square(4);
        $circle = new Shapes\Circle(4);
        $rectangle = new Shapes\Rectangle(4, 5);

        // turn into 3D objects
        $cube = new Shapes\Extrude($square, 4);
        $cylinder = new Shapes\Extrude($circle, 4);
        $cuboid = new Shapes\Extrude($rectangle, 7);

        // log the volumes of each
        dump(
            $cube->volume(), // 64
            $cylinder->volume(), // 201.06192982975
            $cuboid->volume() // 140
        );
    }

    // public function library()
    // {
    //     echo "\nInterfaces 03) Library\n";

    //     $shelf = new Library\Shelf();
    //     $shelf->addItem(new Library\Book("Zero: The Biography of a Dangerous Idea", 256));
    //     $shelf->addItem(new Library\DVD("Hunt for the Wilderpeople"));
    //     $shelf->addItem(new Library\CD("Teal Album"));

    //     $otherShelf = new Library\Shelf();
    //     $otherShelf->addItem(new Library\Book("The Power Broker", 1336));
    //     $otherShelf->addItem(new Library\DVD("Black Sheep"));

    //     $library = new Library\Library();
    //     $library->addShelf($shelf);
    //     $library->addShelf($otherShelf);

    //     dump($library->titles()); // array:5 [ 0 => "Zero: The Biography of a Dangerous Idea" 1 => "Hunt for the Wilderpeople" 2 => "Teal Album" 3 => "The Power Broker" 4 => "Black Sheep" ]
    // }

    public function spoon()
    {
        echo "\nInheritance 01) Spoon\n";

        $spoon = new Cutlery\Spoon();
        $runcible = new Cutlery\RuncibleSpoon();

        $spoon->scoop()->scoop();
        $runcible->scoop()->scoop();

        dump(
            $spoon->howManyScoops(), // 2
            $runcible->howManyScoops() // 4
        );
    }

    public function languages()
    {
        echo "\nInheritance 02) Languages\n";

        $english = new Languages\English();
        $french = new Languages\French();
        $arabic = new Languages\Arabic();

        dump(
            $english->name(), // "English"
            $english->hello(), // "Hello"

            $french->name(), // "French"
            $french->hello(), // "Bonjour

            $arabic->name(), // "Arabic"
            $arabic->hello() // "مرحبا"
        );
    }




}
