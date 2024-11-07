const Sequelize = require('sequelize');
const sequelize = new Sequelize('empregados', 'root', '', {
    host: 'localhost',
    dialect: 'mysql'
});

module.exports = sequelize;
