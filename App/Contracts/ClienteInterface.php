<?php 
declare(strict_types=1);

namespace App\Contracts;

interface ClienteInterface extends BaseInterface
{
	 public function getClienteById(int $id): mixed;
}