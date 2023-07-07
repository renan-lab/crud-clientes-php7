<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/mensagem.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Idade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT id, nome, sobrenome, email, idade FROM cliente";
                    $resultado = mysqli_query($connect, $sql);
                    mysqli_close($connect);

                    if (mysqli_num_rows($resultado) > 0):

                    while ($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['nome'] ?></td>
                    <td><?php echo $dados['sobrenome'] ?></td>
                    <td><?php echo $dados['email'] ?></td>
                    <td><?php echo $dados['idade'] ?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating blue"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados['id'] ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                      <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id'] ?>" class="modal">
                        <div class="modal-content">
                            <h4>Deletar</h4>
                            <p>Tem certeza que deseja deletar esse cliente?</p>
                        </div>
                        <div class="modal-footer">
                            
                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Deletar</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php 
                    endwhile;
                    else: ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    <?php
                    endif;
                ?>
            </tbody>
        </table>
        <a href="adicionar.php" class="btn">Adicionar cliente</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>