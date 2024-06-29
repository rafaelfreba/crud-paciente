<?php

namespace App\DataObjects;

class ChartData {
    private $name;
    private $type;
    private $data;
    private $title;

    public function __construct($name, $type, $data, $title) {
        $this->name = $name;
        $this->type = $type;
        $this->data = $data;
        $this->title = $title;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getData() {
        return $this->data;
    }

    public function getTitle() {
        return $this->title;
    }
}
