const express = require('express');
const exphbs = require('express-handlebars');
const bodyParser = require('body-parser');
const sequelize = require('./config/database');
const empregadoRoutes = require('./routes/empregadoRoutes'); // Importa as rotas
const helpers = require('handlebars-helpers')(); // Importa o handlebars-helpers
const path = require('path'); // Importa o módulo path

const app = express();

// Configurar o Express para usar Handlebars como template engine
app.engine('handlebars', exphbs.engine({
  helpers: helpers // Registra todos os helpers do pacote handlebars-helpers
}));
app.set('view engine', 'handlebars');

// Configura o diretório de arquivos estáticos (CSS, JS, imagens, etc.)
app.use(express.static(path.join(__dirname, 'public'))); // Aqui, 'public' é onde o CSS será armazenado

app.use(bodyParser.urlencoded({ extended: false }));
app.use('/', empregadoRoutes); // Usa as rotas

// Iniciar o servidor e sincronizar com o banco de dados
sequelize.sync().then(() => {
  app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
  });
}).catch(error => {
  console.error('Erro ao conectar ao banco de dados:', error);
});
