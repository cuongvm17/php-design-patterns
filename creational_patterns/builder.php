<?php
    /*
        Khởi tạo đối tượng phức tạp bằng  việc cung cấp một cách xây dựng đối tượng theo từng bước một.
    */

    class Directer
    {
        public function build(BuilderInterface $build)
        {
            $build->createVehicle();
            $build->addDoors();
            $build->addEngine();
            $build->addWheel();
            return $build->getVehicle();
        }
    }

    interface BuilderInterface
    {
        public function createVehicle();
        public function addWheel();
        public function addEngine();
        public function addDoors();
        public function getVehicle();
    }

    class TruckBuilder implements BuilderInterface
    {
        private $truck;

        public function addDoors()
        {
            $this->truck->setPart('rightDoor', new Door());
            $this->truck->setPart('leftFoor', new Door());
        }

        public function addEngine()
        {
            $this->truck->setPart('wheel1', new Wheel());
            $this->truck->setPart('wheel2', new Wheel());
            $this->truck->setPart('wheel3', new Wheel());
            $this->truck->setPart('wheel4', new Wheel());
        }

        public function addWheel()
        {
            $this->truck->setPart('wheel1', new Wheel());
            $this->truck->setPart('wheel2', new Wheel());
            $this->truck->setPart('wheel3', new Wheel());
            $this->truck->setPart('wheel4', new Wheel());

        }

        public function getVehicle()
        {
            return null;
        }

        public function createVehicle()
        {
            $this->truck = new Truck();
        }
    }

    class CarBuilder implements BuilderInterface
    {
        private $car;

        public function addDoors()
        {
            $this->car->setPart('rightDoor', new Door());
            $this->car->setPart('lefttDoor', new Door());
            $this->car->setPart('trunkLid', new Door());
        }

        public function addEngine()
        {
            $this->car->setPart('Engine', new Engine);
        }

        public function addWheel()
        {
            $this->car->setPart('wheelLF', new Wheel());
            $this->car->setPart('wheelRF', new Wheel());
            $this->car->setPart('wheelLR', new Wheel());
            $this->car->setPart('wheelRR', new Wheel());

        }

        public function createVehicle()
        {
            $this->car = new Car();
        }

        public function getVehicle()
        {
            return $this->car;
        }
    }

    abstract class Vehicle
    {
        private $data = [];

        public function setpart($key, $val)
        {
            $this->data[$key] = $val;
        }

        public function getPart()
        {
            return $this->data;
        }
    }

    class Truck extends Vehicle
    {
        //code
    }

    class Car extends Vehicle
    {
        //code
    }

    class Door
    {
        //code
    }

    class Engine
    {
        //code
    }

    class Wheel
    {
        //code
    }

    $car = new CarBuilder();
    $object = (new Directer())->build($car);
    var_dump($object);
?>
