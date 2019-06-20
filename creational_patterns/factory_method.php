<?php
    /*
        Định nghĩa 1 interface để tạo một đối tượng, nhưng để cho các lớp con implements nó triển khai các method của interface đó. Factory method có nhiệm vụ quyết định lớp nào sẽ được khởi tạo dựa vào đầu vào của nó.
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

    class ShapeFactory
    {
        public function getShape($type)
        {
            switch ($type) {
                case Shape::SQUARE:
                    return new Square;
                    break;
                case Shape::CIRCLE:
                    return new Circle;
                    break;
                case Shape::RECTANGLE:
                    return new Rectangle;
                    break;
                default:
                    return null;
                    break;
            }
        }
    }

    $factory = new ShapeFactory();
    $shapeCircle = $factory->getShape(Shape::CIRCLE);
    $shapeCircle->draw();
?>
