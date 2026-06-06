<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Core\{Database, Container, Config};

use App\Contracts\{
	UserInterface, FreelancerInterface, 
	ClienteInterface, TrabalhoInterface,
	PropostaInterface, FreelancerSkillInterface, SkillInterface, ContratoInterface
};

use App\Models\{
	User, Freelancer, 
	Cliente, Trabalho, Proposta, FreelancerSkill, Skill, Contrato
};

use App\Controllers\{
	SignupController, HomeController, 
	LoginController, FreelancerController, 
	ClienteController, TrabalhoController, PropostaController,
	DashboardController, ContratoController
};

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

Config::load(__DIR__ . '/../App/Config/App.php');

$container = new Container();
$container->bind(UserInterface::class, User::class);
$container->bind(FreelancerInterface::class, Freelancer::class);
$container->bind(ClienteInterface::class, Cliente::class);
$container->bind(TrabalhoInterface::class, Trabalho::class);
$container->bind(PropostaInterface::class, Proposta::class);
$container->bind(FreelancerSkillInterface::class, FreelancerSkill::class);
$container->bind(SkillInterface::class, Skill::class);
$container->bind(ContratoInterface::class, Contrato::class);
$router = new Router($container);

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'index']);
$router->get('/signup', [SignupController::class, 'index']);
$router->post('/signup/submit', [SignupController::class, 'submit']);

$router->get('/freelancers', [FreelancerController::class, 'index']);
$router->get('/freelancer/perfil/{id}', [FreelancerController::class, 'perfil']);
$router->get('/freelancer/trabalhos', [FreelancerController::class, 'trabalhos']);
$router->get('/freelancer/contratos', [FreelancerController::class, 'contratos']);
$router->get('/freelancer/propostas', [FreelancerController::class, 'propostas']);

$router->get('/freelancer/signup', [FreelancerController::class, 'create']);
$router->post('/freelancer/signup', [FreelancerController::class, 'create']);

$router->get('/clientes', [ClienteController::class, 'index']);
$router->get('/cliente/signup', [ClienteController::class, 'create']);
$router->post('/cliente/signup', [ClienteController::class, 'create']);
$router->get('/cliente/trabalhos', [ClienteController::class, 'trabalhos']);
$router->get('/cliente/contrato', [ClienteController::class, 'contrato']);
$router->get('/cliente/propostas', [ClienteController::class, 'propostas']);

$router->get('/trabalhos', [TrabalhoController::class, 'index']);
$router->get('/trabalhos/create', [TrabalhoController::class, 'create']);
$router->post('/trabalhos/create', [TrabalhoController::class, 'create']);
$router->get('/trabalho/delete/{id}', [TrabalhoController::class, 'delete']);
$router->post('/trabalho/delete/{id}', [TrabalhoController::class, 'delete']);
$router->get('/trabalho/update/{id}', [TrabalhoController::class, 'update']);
$router->post('/trabalho/update/{id}', [TrabalhoController::class, 'update']);

$router->get('/propostas', [PropostaController::class, 'index']);
$router->get('/proposta/create/{id}', [PropostaController::class, 'create']);
$router->post('/proposta/create/{id}', [PropostaController::class, 'create']);
$router->get('/proposta/update/{id}', [PropostaController::class, 'update']);
$router->post('/proposta/update/{id}', [PropostaController::class, 'update']);
$router->get('/proposta/delete/{id}', [PropostaController::class, 'delete']);
$router->post('/proposta/delete/{id}', [PropostaController::class, 'delete']);

$router->get('/contrato', [ContratoController::class, 'index']);
$router->get('/contrato/create/{id}', [ContratoController::class, 'create']);
$router->post('/contrato/create/{id}', [ContratoController::class, 'create']);

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/dashboard', [DashboardController::class, 'admin']);
$router->get('/cliente/dashboard', [DashboardController::class, 'cliente']);
$router->get('/cliente/dashboard', [DashboardController::class, 'cliente']);
$router->get('/freelancer/dashboard', [DashboardController::class, 'freelancer']);


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($method, $uri);








