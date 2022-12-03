#Exemplos
---------

```php
require("src/transition.php");
$mpesa = new Mpesa("56"); 

$c2b = $mpesa->c2b([
  'numero' => '846369717',
  'valor' => '50',
  'referencia' => 'testedePagamento'
]);
var_dump($c2b);

```

```js


console.log("ola mundo!")

```