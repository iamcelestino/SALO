<?php 
declare(strict_types=1);

namespace App\Models;
use App\Core\Model;
use App\Contracts\PropostaInterface;

class Proposta extends Model implements PropostaInterface
{	public function getTodasPropostas(): array|object
	{
		return $this->query(
			"SELECT * FROM propostas ORDER BY criado_em DESC
			",
			[],
		);
	}

	public function getPropostasByFreelancer(int $id): array|object
	{
		return $this->query(
			"SELECT 
			    t.id AS id_trabalho, t.titulo,
			    t.status,
			    t.descricao, t.nivel_requerido, t.orcamento,
			    c.id AS cliente_id,
			    p.valor_proposto,
			    p.status AS status_proposta,
			    u_free.nome AS nome_freelancer,
			    f.id AS freelancer_id, f.titulo_profissional AS especialidade_freelancer
			FROM clientes c
			JOIN trabalhos t ON c.id = t.client_id
			JOIN propostas p ON t.id = p.trabalhos_id
			JOIN freelancers f ON p.freelancer_id = f.id
			JOIN users u_free ON f.user_id = u_free.id
			WHERE f.id = :id
			ORDER BY t.criado_em DESC, p.valor_proposto ASC
			",
			['id' => $id],
			'object'
		);
	}

	public function getPropostasByCliente(int $id): array|object
	{
		return $this->query(
			"SELECT 
			    t.id AS id_trabalho, t.titulo,
			    t.status,
			    t.descricao, t.nivel_requerido, t.orcamento,
			    c.id AS cliente_id,
			    p.valor_proposto,
			    p.status AS status_proposta,
			    u_free.nome AS nome_freelancer,
			    f.id AS freelancer_id, f.titulo_profissional AS especialidade_freelancer
			FROM clientes c
			JOIN trabalhos t ON c.id = t.client_id
			JOIN propostas p ON t.id = p.trabalhos_id
			JOIN freelancers f ON p.freelancer_id = f.id
			JOIN users u_free ON f.user_id = u_free.id
			WHERE c.id = :id
			ORDER BY t.criado_em DESC, p.valor_proposto ASC
			",
			['id' => $id],
			'object'
		);
	}
}