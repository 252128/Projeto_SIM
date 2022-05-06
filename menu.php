<?php
    if (!isset($_SESSION['utilizador'])){
?>
    <table width="100%" border="1">
    <tr>
        <th> Início </th>
        <th> <a href="showlogin.php"> Iniciar Sessão </a></th>
    </tr>

</table>

<?php
    }
    switch($_SESSION['utilizador']){
        case 'MF':
?>
            <table>
                <tr>
                    <th> Início </th>
                    <th> Pacientes </th>
                    <th> Registo Consultas </th>
                    <th> Perfil </th>
                    <th> Log out </th>
                </tr>
            </table>
<?php
        break;
        case 'MHC' || 'MHD':
?>
            <table>
                <tr>
                    <th> Início </th>
                    <th> Lista de Espera </th>
                    <th> Perfil </th>
                    <th> Log out </th>
                </tr>
            </table>
<?php
            break;
        case 'Adm':
?>
            <table>
                <tr>
                    <th> Início </th>
                    <th> Utilizadores </th>
                    <th> Estatística </th>
                    <th> Perfil </th>
                    <th> Log out </th>
                </tr>
            </table>
<?php
            break;
    }
