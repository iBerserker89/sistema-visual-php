<?php
require_once 'servidor.php';

/**
 * Gera o select para o campo ordem
 *
 * @param $ordem
 * @return string
 */
function select_ordem($ordem = 0) {
    $saida = '';
    $saida .= '<select name="ordem">';
    for ($i = -10; $i <= 10 ; $i++) {
        $saida .= '<option value="' . $i . '"';
        if ($i == $ordem) {
            $saida .= 'selected';
        }
        $saida .= '>' . $i . '</option>';
    }
    $saida .= '</select>';
    return $saida;
}

// Deleta um item do menu
if (isset($_GET['acao'])) {
    if ($_GET['acao'] == 'deletar') {
        $id = (int)$_GET['id'];
        consulta_dados("DELETE FROM sistema WHERE id = $id");
        header('location: administra-menu.php');
    }
}

// Recebe os dados do formulário
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    $url = $_GET['url'];
    $ordem = $_GET['ordem'];
    $aviso = '';

    if (empty($nome)) {
        $aviso .= 'O nome do link é obrigarório<br>';
    }
    if (empty($url)) {
        $aviso .= 'A url é obrigarória<br>';
    }
    if (empty($aviso)) {
        if (!empty($_GET['id'])) {
            // Verifica se está recebendo o id do formulário
            // Se tiver, edita o registro
            // Se não tiver, cadastra um novo registro
            $id = (int)$_GET['id'];
            consulta_dados("update sistema set nome = '$nome', url = '$url', ordem = '$ordem' where id = $id");
        } else {
            consulta_dados("insert into sistema (nome, url, ordem) 
                values ('$nome', '$url', '$ordem')");
        }
        header('location: administra-menu.php');
    }
}

// Busca os itens cadastrados no banco para mostrar na tela
$itensQuery = consulta_dados("select * from sistema order by ordem asc");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title></title>
    <?php include_once 'header.php'; ?>
    <script type="text/javascript">
        function deletar(id) {
            if (confirm("você tem certeza que quer deletar este registro?")) {
                window.location = "administra-menu.php?acao=deletar&id=" + id;
            }
        }
    </script>
</head>
<body>
<?php include_once 'menu1.php'; ?>

<?php if (!empty($aviso)) : ?>
    <?php print $aviso; ?>
<?php endif; ?>

<table>
    <tr>
        <th>nome do link</th>
        <th>endereço</th>
        <th>ordem</th>
        <th>ações</th>
    </tr>
    <?php // Mostra os registros do banco ?>
    <?php while ($itens = mysqli_fetch_array($itensQuery)) : ?>
        <tr>
            <form action="administra-menu.php" method="get">
                <input type="hidden" name="id" value="<?php print $itens['id']?>">
                <td><input type="text" name="nome" value="<?php print $itens['nome']?>"></td>
                <td><input type="text" name="url" value="<?php print $itens['url']?>"></td>
                <td><?php echo select_ordem($itens['ordem']); ?></td>
                <td>
                    <input type="submit" value="editar">
                    <input type="button" value="deletar" onclick="deletar(<?php print $itens['id']?>)">
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
    <tr>
        <?php // Formulário para cadastro de um novo item ?>
        <form action="administra-menu.php" method="get">
            <td><input type="text" name="nome"></td>
            <td><input type="text" name="url"></td>
            <td><?php echo select_ordem(); ?></td>
            <td>
                <input type="submit" value="cadastrar novo item">
            </td>
        </form>
    </tr>
</table>
<?php include_once 'menu2.php'; ?>
</body>
</html>
