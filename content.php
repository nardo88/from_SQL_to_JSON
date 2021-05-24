<?php

$connection = new PDO ('mysql:host=localhost; dbname=magazine; charset=utf8', 'root', 'root');

$content = $connection->query("SELECT * FROM content");


$items = [];

class Item {
    public function __construct($id, $name, $description, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }
}



foreach($content as $item){
    $newItem = new Item($item['id'], $item['name'], $item['description'], $item['price'], $item['image'], );
    array_push($items, $newItem);
}


$items = json_encode($items);
header('Content-type: application/json');

file_put_contents('test.json', $items);

echo $items;

?>

