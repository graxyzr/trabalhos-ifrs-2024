function calcularSalarioLiquido(salarioBruto) {
  const inss = salarioBruto * 0.11;
  const irpf = salarioBruto * 0.075;
  const salarioLiquido = salarioBruto - inss - irpf;
  return salarioLiquido;
}

function getDepartamentoDescricao(departamento) {
  const departamentos = {
    1: 'Administrativo',
    2: 'Designer',
    3: 'Contábil',
    4: 'Fábrica'
  };
  return departamentos[departamento] || 'Desconhecido';
}

module.exports = {
  calcularSalarioLiquido,
  getDepartamentoDescricao
};
