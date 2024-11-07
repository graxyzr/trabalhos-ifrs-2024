const Empregado = require('../models/Empregado');
const Sequelize = require('sequelize'); // Importar Sequelize
const { calcularSalarioLiquido, getDepartamentoDescricao } = require('../utils');

// Listar todos os empregados
exports.listarEmpregados = async (req, res) => {
  try {
    const empregados = await Empregado.findAll();
    const empregadosFormatados = empregados.map(emp => ({
      id: emp.id,
      nome: emp.nome,
      salario_bruto: emp.salario_bruto,
      salario_liquido: calcularSalarioLiquido(emp.salario_bruto),
      departamento: getDepartamentoDescricao(emp.departamento)
    }));
    res.render('empregados', { empregados: empregadosFormatados, layout: false });
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao listar empregados.');
  }
};

// Mostrar formulário para criar um novo empregado
exports.novoEmpregadoForm = (req, res) => {
  res.render('novoEmpregado', { layout: false });
};

// Criar um novo empregado
exports.criarEmpregado = async (req, res) => {
  const { nome, salario_bruto, departamento } = req.body;
  try {
    await Empregado.create({ nome, salario_bruto, departamento });
    res.redirect('/empregados');
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao criar empregado.');
  }
};

// Mostrar formulário para editar um empregado
exports.editarEmpregadoForm = async (req, res) => {
  try {
    const empregado = await Empregado.findByPk(req.params.id); // Busca o empregado pelo ID
    if (empregado) {
      // Renderiza a página de edição com os dados do empregado
      res.render('editarEmpregado', {
        empregado: {
          id: empregado.id,
          nome: empregado.nome,
          salario_bruto: empregado.salario_bruto,
          departamento: empregado.departamento, // Adicione departamento aqui
        },
        layout: false
      });
    } else {
      res.status(404).send('Empregado não encontrado.'); // Retorna erro se não encontrado
    }
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao carregar o formulário de edição.');
  }
};

// Atualizar um empregado
exports.atualizarEmpregado = async (req, res) => {
  const { nome, salario_bruto, departamento } = req.body;
  try {
    // Atualizar os dados do empregado baseado no ID
    await Empregado.update(
      { nome, salario_bruto, departamento },
      { where: { id: req.params.id } }
    );
    res.redirect('/empregados'); // Redireciona para a lista de empregados após a atualização
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao atualizar empregado.');
  }
};

// Deletar um empregado
exports.deletarEmpregado = async (req, res) => {
  try {
    await Empregado.destroy({ where: { id: req.params.id } });
    res.redirect('/empregados');
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao deletar empregado.');
  }
};

// Mostrar empregado com o maior salário
exports.maiorSalario = async (req, res) => {
  try {
    const empregado = await Empregado.findOne({ order: [['salario_bruto', 'DESC']] });
    if (empregado) {
      res.render('empregado', {
        empregado: {
          id: empregado.id,
          nome: empregado.nome,
          salario_bruto: empregado.salario_bruto,
          salario_liquido: calcularSalarioLiquido(empregado.salario_bruto),
          departamento: getDepartamentoDescricao(empregado.departamento)
        },
        layout: false
      });
    } else {
      res.status(404).send('Nenhum empregado encontrado.');
    }
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao buscar o empregado com o maior salário.');
  }
};

// Mostrar empregado com o menor salário
exports.menorSalario = async (req, res) => {
  try {
    const empregado = await Empregado.findOne({ order: [['salario_bruto', 'ASC']] });
    if (empregado) {
      res.render('empregado', {
        empregado: {
          id: empregado.id,
          nome: empregado.nome,
          salario_bruto: empregado.salario_bruto,
          salario_liquido: calcularSalarioLiquido(empregado.salario_bruto),
          departamento: getDepartamentoDescricao(empregado.departamento)
        },
        layout: false
      });
    } else {
      res.status(404).send('Nenhum empregado encontrado.');
    }
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao buscar o empregado com o menor salário.');
  }
};

// Contar empregados no setor administrativo
exports.contarAdministrativo = async (req, res) => {
  try {
    const count = await Empregado.count({ where: { departamento: 1 } });
    res.render('adminCount', { count, layout: false });
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao contar empregados no setor administrativo.');
  }
};

// Pesquisar empregados por nome
exports.pesquisarEmpregados = async (req, res) => {
  const { nome } = req.query; // Obtém o parâmetro 'nome' da query string
  try {
    const empregados = await Empregado.findAll({
      where: {
        nome: {
          [Sequelize.Op.like]: `%${nome}%` // Busca por nomes que contenham o termo de pesquisa
        }
      }
    });

    const empregadosFormatados = empregados.map(emp => ({
      id: emp.id,
      nome: emp.nome,
      salario_bruto: emp.salario_bruto,
      salario_liquido: calcularSalarioLiquido(emp.salario_bruto),
      departamento: getDepartamentoDescricao(emp.departamento)
    }));

    res.render('empregados', { empregados: empregadosFormatados, layout: false });
  } catch (error) {
    console.error(error); // Logar o erro
    res.status(500).send('Erro ao pesquisar empregados.');
  }
};