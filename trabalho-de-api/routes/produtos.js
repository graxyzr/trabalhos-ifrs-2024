const express = require('express');
const prisma = require('../database');
const router = express.Router();

router.post('/', async (req, res) => {
    try {
        const produto = await prisma.produto.create({
            data: req.body
        });
        res.status(201).json(produto);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

router.get('/', async (req, res) => {
    try {
        const produtos = await prisma.produto.findMany();
        res.json(produtos);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

router.get('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const produto = await prisma.produto.findUnique({
            where: { id: parseInt(id) }
        });
        if (produto) {
            res.json(produto);
        } else {
            res.status(404).json({ error: 'Produto não encontrado' });
        }
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

router.put('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const produto = await prisma.produto.update({
            where: { id: parseInt(id) },
            data: req.body
        });
        res.json(produto);
    } catch (error) {
        res.status(404).json({ error: 'Produto não encontrado ou erro na atualização' });
    }
});

router.delete('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        await prisma.produto.delete({
            where: { id: parseInt(id) }
        });
        res.status(204).send();
    } catch (error) {
        res.status(404).json({ error: 'Produto não encontrado' });
    }
});

module.exports = router;
