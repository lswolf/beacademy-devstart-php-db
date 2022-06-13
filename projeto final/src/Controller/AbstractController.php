<?php 
declare(strict_types=1);
namespace App\Controller;
abstract class AbstractController
{
public function render(string $name): void
    {
        include dirname(__DIR__).'/View/'.$name.'.php';
    }


}