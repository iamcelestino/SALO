<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Core\Controller;
use App\Services\{TrabalhoService, ClienteService, FreelancerService, UserService, ContratoService, PropostaService};

class DashboardController extends Controller
{
    public function __construct(
        protected TrabalhoService   $trabalho,
        protected ClienteService    $cliente,
        protected FreelancerService $freelancer,
        protected UserService       $usuario,
        protected ContratoService   $contrato,
        protected PropostaService   $proposta
    ) {}

    public function index(): void
    {
        if (!$this->usuario->isLogged()) {
            $this->redirect('/login');
        }

        $role = $_SESSION['USER'][0]->role ?? '';
        $redirect = match ($role) {
            'cliente'    => '/cliente/dashboard',
            'freelancer' => '/freelancer/dashboard',
            'admin'      => 'dashboard',
            default      => 'dashboard',
        };
        $this->redirect($redirect);
    }

    public function admin(): void
    {
        if (!$this->usuario->isLogged()) {
            $this->redirect('/login');
        }

        $contratos   = $this->contrato->getAllContratos();
        $freelancers = $this->freelancer->getTodosFreelancers();
        $trabalhos   = $this->trabalho->getTodosTrabalhos();  
        $propostas   = $this->proposta->getTodasPropostas();     

        $this->view('dashboard', compact(
            'contratos',
            'freelancers',
            'trabalhos',
            'propostas'
        ));
    }

    public function cliente(): void
    {
        $user = $_SESSION['USER'][0];
        if ($user && $user->role === 'cliente') {
            $cliente   = $this->cliente->getClienteById($user->id);
            $trabalhos = $this->trabalho->getTrabalhosComPropostas($cliente[0]->id);
        }
        $this->view('cliente_dashboard', [
            'trabalhos' => $trabalhos ?? [],
        ]);
    }

    public function freelancer(): void
    {
        $user = $_SESSION['USER'][0];
        if ($user && $user->role === 'freelancer') {
            $freelancer = $this->freelancer->getByFreelancerByUserId($user->id);
            $trabalhos  = $this->trabalho->getTrabalhosByFreelancer($freelancer[0]->id);
        }
        $this->view('freelancer_dashboard', [
            'trabalhos' => $trabalhos ?? [],
        ]);
    }
}