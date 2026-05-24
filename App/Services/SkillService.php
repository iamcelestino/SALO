<?php
<<<<<<< HEAD
declare(strict_types=1);

namespace App\Services;
=======

declare(strict_types=1);

namespace App\Services;

>>>>>>> 82131aa (add more files)
use App\Contracts\SkillInterface;

class SkillService
{
<<<<<<< HEAD
	public function __construct(
		protected SkillInterface $skill
	){}

	public function create(array $skill): void
	{
		$this->skill->insert($skill);
	}
}
=======
    public function __construct(
        private readonly SkillInterface $skillModel
    ) {}

    public function getAllSkills(): array
    {
        return $this->skillModel->all();
    }

    public function getSkillById(int $id): ?array
    {
        return $this->skillModel->find($id) ?: null;
    }

    public function createSkill(array $data): bool|int
    {
        $errors = $this->validate($data);
        if (!empty($errors)) {
            return false;
        }

        // Prevent duplicates
        if ($this->skillModel->findByName(trim($data['nome']))) {
            return false;
        }

        return $this->skillModel->create([
            'nome' => trim($data['nome']),
        ]);
    }

    public function updateSkill(int $id, array $data): bool
    {
        $skill = $this->getSkillById($id);
        if (!$skill) {
            return false;
        }

        $errors = $this->validate($data);
        if (!empty($errors)) {
            return false;
        }

        // Prevent duplicate name (excluding current)
        $existing = $this->skillModel->findByName(trim($data['nome']));
        if ($existing && (int) $existing['id'] !== $id) {
            return false;
        }

        return $this->skillModel->update($id, [
            'nome' => trim($data['nome']),
        ]);
    }

    private function validate(array $data): array
    {
        $errors = [];
        if (empty($data['nome']) || strlen(trim($data['nome'])) < 2) {
            $errors[] = 'O nome da skill deve ter pelo menos 2 caracteres.';
        }
        if (!empty($data['nome']) && strlen(trim($data['nome'])) > 100) {
            $errors[] = 'O nome da skill não pode exceder 100 caracteres.';
        }
        return $errors;
    }

    public function getValidationErrors(array $data): array
    {
        return $this->validate($data);
    }
}
>>>>>>> 82131aa (add more files)
