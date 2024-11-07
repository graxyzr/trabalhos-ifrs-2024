const express = require('express');
const router = express.Router();
const empregadoController = require('../controllers/empregadoController');

// Rota para a página inicial
router.get('/', (req, res) => {
    res.render('home', { layout: false });
});

// Rota para listar todos os empregados
router.get('/empregados', empregadoController.listarEmpregados);

// Rota para exibir o formulário de criação de um novo empregado
router.get('/empregados/novo', empregadoController.novoEmpregadoForm);
router.post('/empregados', empregadoController.criarEmpregado); // Rota para criar um novo empregado

// Rota para exibir o formulário de edição de um empregado
router.get('/empregados/:id/editar', empregadoController.editarEmpregadoForm);
router.post('/empregados/:id', empregadoController.atualizarEmpregado); // Rota para atualizar um empregado

// Rota para deletar um empregado
router.post('/empregados/:id/deletar', empregadoController.deletarEmpregado);

// Rota para exibir o empregado com o maior salário
router.get('/empregados/maior-salario', empregadoController.maiorSalario);

// Rota para exibir o empregado com o menor salário
router.get('/empregados/menor-salario', empregadoController.menorSalario);

// Rota para contar empregados no setor administrativo
router.get('/empregados/admin-count', empregadoController.contarAdministrativo);

// Rota para pesquisar empregados por nome
router.get('/empregados/pesquisar', empregadoController.pesquisarEmpregados);

module.exports = router;