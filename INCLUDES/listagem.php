<section>
    <a href="cadastrar">
        <button class="btn btn-success">Cadastrar</button>
    </a>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ações</th> <!-- Para editar e excluir -->
            </tr>
        </thead>

        <tbody>
            <?php foreach ($vagas as $key => $value) { ?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->titulo; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td><?php echo date('d/m/y - H:i:s', strtotime($value->data)); ?></td>
                    <td><?php echo ($value->status == 's' ? 'Ativo' : 'Inativo'); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $value->id; ?>">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>

                        <a href="excluir.php?id=<?php echo $value->id; ?>">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>