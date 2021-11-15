<?php

namespace DesignPattern\PHP\FactoryMethod;

abstract class Creator
{
	abstract public function factoryMethod();

	public function doOperation()
	{
		$product = $this->factoryMethod();
		$result = $product->operation();
		return $result;
	}
}

class ConcreteCreator1 extends Creator
{
	public function factoryMethod()
	{
		return new ConcreateProduct1;
	}
}

class ConcreteCreator2 extends Creator
{
	public function factoryMethod()
	{
		return new ConcreateProduct2;
	}
}

interface Product
{
	public function operation();
}

class ConcreateProduct1 implements Product
{
	public function operation()
	{
		return 'operation from ConcreateProduct1';
	}
}

class ConcreateProduct2 implements Product
{
	public function operation()
	{
		return 'operation from ConcreateProduct2';
	}
}

function clientCode(Creator $craetor)
{
	echo $craetor->doOperation();
}

clientCode(new ConcreteCreator1());
echo "\n";
clientCode(new ConcreteCreator2());