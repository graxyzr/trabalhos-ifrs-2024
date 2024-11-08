const express = require('express');
const proprietariosRoutes = require('./routes/proprietarios');
const produtosRoutes = require('./routes/produtos');

const app = express();
app.use(express.json());

app.use('/api/proprietarios', proprietariosRoutes);
app.use('/api/produtos', produtosRoutes);

app.listen(3000, () => {
    console.log('Servidor rodando na porta 3000');
});
