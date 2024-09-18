const express = require('express');
const handlebars = require('handlebars');
const handlebars_mod = require('express-handlebars');
const { allowInsecurePrototypeAccess } = require('@handlebars/allow-prototype-access');

const appRoutes = require('./routes/approutes');
const app = express();

const { sequelize, Sequelize } = require('./config/database');
const booksModel = require("./models/books")(sequelize, Sequelize);

app.use(express.urlencoded({ extended: false }));
app.use(express.json());

app.engine('handlebars', handlebars_mod.engine({
    handlebars: allowInsecurePrototypeAccess(handlebars)
}));
app.set('view engine', 'handlebars');

app.use(appRoutes);

// Altere a porta para 3001 ou outra porta disponível
const PORT = process.env.PORT || 3001;
app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});
