<?php
declare(strict_types=1);

namespace App\Services;
use App\Contracts\TrabalhoInterface;

class TrabalhoService
{
	public function __construct(
		protected TrabalhoInterface $trabalho
	){}

	public function create(array $trabalho): void 
	{
		$this->trabalho->insert($trabalho);
	}

	public function getTodosTrabalhos(): array|object 
	{
		return $this->trabalho->all();
	}

	public function getTrabalhoById(int $id): array|object
	{
		return this->getTrabalhoById($id);
	}

	public function getTodosTrabalhoByCliente(int $idCliente): array|object
	{
		return $this->trabalho->getTrabalhosByCliente($idCliente);
	}

	public function getTrabalhosComPropostas(int $id): array|object
	{
		return $this->trabalho->getTrabalhosComPropostas($id);
	}

	public function getTrabalhosByFreelancer(int $id): array|object
	{
		return $this->trabalho->getTrabalhosByFreelancer($id);
	}

	public function getSingleTodo(int $id): array|object
	{
		return $this->trabalho->where('id', $id);
	}

	public function delete(int $id)
	{
		$this->trabalho->delete($id);
	}

	public function update(int $id, $data)
	{
		$this->trabalho->update($id, $data);
	}
}