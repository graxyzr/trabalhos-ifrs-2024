const express = require('express');
const prisma = require('../database');
const router = express.Router();

router.post('/', async (req, res) => {
    try {
        const proprietario = await prisma.proprietario.create({
            data: req.body
        });
        res.status(201).json(proprietario);
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

router.get('/', async (req, res) => {
    try {
        const proprietarios = await prisma.proprietario.findMany();
        res.json(proprietarios);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

router.get('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const proprietario = await prisma.proprietario.findUnique({
            where: { id: parseInt(id) }
        });
        if (proprietario) {
            res.json(proprietario);
        } else {
            res.status(404).json({ error: 'Proprietário não encontrado' });
        }
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

router.put('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const proprietario = await prisma.proprietario.update({
            where: { id: parseInt(id) },
            data: req.body
        });
        res.json(proprietario);
    } catch (error) {
        res.status(404).json({ error: 'Proprietário não encontrado ou erro na atualização' });
    }
});

router.delete('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        await prisma.proprietario.delete({
            where: { id: parseInt(id) }
        });
        res.status(204).send();
    } catch (error) {
        res.status(404).json({ error: 'Proprietário não encontrado' });
    }
});

module.exports = router;
