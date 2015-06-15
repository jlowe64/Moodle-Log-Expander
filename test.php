<?php

class A {
  public function hello() {
    return get_class($this);
  }
}

class B extends A {
    public function __construct($a) {

    }
}

$b = 'B';
echo (new $b(1))->hello();