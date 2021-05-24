<?php
// устанавливаем соединение
    $connection = new PDO ('mysql:host=localhost; dbname=magazine; charset=utf8', 'root', 'root');
    // получаем данные из таблицы
    $content = $connection->query("SELECT * FROM content");
    // массив который будем переводить в JSON
    $items = [];
    // класс на основании которого будем создавать объекты дл ямассива
    class Item {
        public function __construct($id, $name, $description, $price, $image) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->image = $image;
        }
    }
    // заполняем массив объектами
    foreach($content as $item){
        $newItem = new Item($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], );
        array_push($items, $newItem);
    }
    // кодируем в JSON
    $items = json_encode($items);
    // на всякий случай прописываем заголовки
    header('Content-type: application/json');
    // для теста записываем в файл JSON (просто так)
    file_put_contents('test.json', $items);
    // возвращаем JSON
    echo $items;
?>

