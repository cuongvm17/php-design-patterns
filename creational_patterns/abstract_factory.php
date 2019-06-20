<?php
    /*
        Đây là phiên bản nâng cấp hơn của factory method. Nó dùng để tạo ra các factory method khác.
    */
    interface Shape
    {
        const SQUARE = 1;
        const CIRCLE = 2;
        const RECTANGLE = 3;

        public function draw();
    }

    class Circle implements Shape
    {
        public function draw()
        {
            echo "Draw circle";
        }
    }

    class Rectangle implements Shape
    {
        public function draw()
        {
            echo "Draw rectangle";
        }
    }

    class Square implements Shape
    {
        public function draw()
        {
            echo "Draw Square";
        }
    }

    interface Color
    {
        public function fill();
    }

    class Red implements Color
    {
        public function fill()
        {
            echo "This is Red";
        }
    }

    class Green implements Color
    {
        public function fill()
        {
            echo "This is Green";
        }
    }

    class Blue implements Color
    {
        public function fill()
        {
            echo "This is Blue";
        }
    }

    abstract class AbstractFactory
    {
        abstract function getShape($type);
        abstract function getColor($color);
    }

    class ShapeFactory extends AbstractFactory
    {
        public function getShape($type)
        {
            switch ($type) {
                case Shape::CIRCLE:
                    return new Circle;
                    break;
                case Shape::RECTANGLE:
                    return new Rectangle;
                    break;
                case Shape::SQUARE:
                    return new Square;
                    break;

                default:
                    return null;
                    break;
            }
        }

        public function getColor($color)
        {
            return null;
        }
    }

    class ColorFactory extends AbstractFactory
    {
        public function getShape($type)
        {
            return null;
        }

        public function getColor($color)
        {
            switch (strtolower($color)) {
                case 'red':
                    return new Red;
                    break;
                case 'blue':
                    return new Blue;
                    break;
                case 'green':
                    return new Green;
                    break;
                default:
                    return null;
                    break;
            }
        }
    }

    class FactoryProducer
    {
        public static function getFactory($choice)
        {
            $choice = strtolower($choice);
            if ($choice == 'shape') {
                return new ShapeFactory;
            } elseif ($choice == 'color') {
                return new ColorFactory;
            }

            return null;
        }
    }

    $shapeFactory = FactoryProducer::getFactory('Shape');
    $shape = $shapeFactory->getShape(Shape::CIRCLE);
    $shape->draw();

    $colorFactory = FactoryProducer::getFactory('Color');
    $color = $colorFactory->getColor('red');
    $color->fill();
?>
