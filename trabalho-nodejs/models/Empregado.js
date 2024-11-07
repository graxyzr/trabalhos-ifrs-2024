const { DataTypes } = require('sequelize');
const sequelize = require('../config/database'); // Caminho para o arquivo de configuração do Sequelize

const Empregado = sequelize.define('Empregado', {
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true
    },
    nome: {
        type: DataTypes.STRING,
        allowNull: false
    },
    salario_bruto: {
        type: DataTypes.DOUBLE,
        allowNull: false
    },
    departamento: {
        type: DataTypes.INTEGER,
        allowNull: false
    }
}, {
    tableName: 'empregados',
    timestamps: false
});

module.exports = Empregado;
