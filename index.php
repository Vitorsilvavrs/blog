<!DOCTYPEhtml >
< html >
    < cabeça >
        < título > Página inicial | Projeto para Web com PHP </ title >
        < link  rel =" folha de estilo "
            href =" lib/bootstrap-4.2.1-dist/css/bootstrap.min.css " >

    </ cabeça >
    < corpo >
        < classe div  =" contêiner " >
            < classe div  =" linha " >
                < div  class =" col-md-12 " >
                    <!--Topo //-->
                    <?php
                        include  'includes/topo.php' ;
                    ?>
                </ div >
            </ div >
            < div  class =" linha " estilo =" min-height: 500px; " >
                < div  class =" col-md-12 " >
                    <!--Menu //-->
                    <?php
                        include  'inclui/menu.php'
                    ?>
        </ div >
        < div  class =" col-md-10 " style =" padding-top: 50px; " >
            <!--Conteúdo //-->
            < h2 > Página Inicial </ h2 >
            <?php
                include  'includes/busca.php'
            ?>

            <?php
                require_once  'includes/funcoes.php' ;
                require_once  'core/conexao_mysql.php' ;
                require_once  'core/sql.php' ;
                require_once  'core/mysql.php' ;
            
                foreach ( $ _GET  as  $ indice => $ dado ){
                    $ $ indice limpar =Dados( $ dado );
                }

                $ data_atual = date( 'Ymd H:i:s' );

                $ critério = [
                    [ 'data_postagem' , '<=' , $ data_atual ]
                ];

                if (!empty( $ busca )){
                    $ critério [] = [
                        'E' ,
                        'texto' ,
                        'como' ,
                        " % { $ busca } % "
                    ];
                }

                $ posts = buscar(
                    'postar' ,
                    [
                        'título' ,
                        'data_postagem' ,
                        'id' ,
                        '(selecione o nome
                            de usuário
                            onde usuario.id = post.usuario_id) como nome'
                    ],
                    $ critério ,
                    'data_postagem DESC'
                );
                ?>
                < div >
                    < div  class =" lista-grupo " >
                        <?php
                        foreach ( $ posts  como  $ post ):
                            $ data = date_create( $ post [ 'data_postagem' ]);
                            $ data = date_format( $ data , 'd/m/YH:i:s' );
                        ?>
                        < a  class =" lista-grupo-item lista-grupo-item-ação "
                            href =" post_detalhe.php?post= <?php  echo  $ post [ 'id' ] ?> " >
                            < strong > <?php  echo  $ post [ 'titulo' ] ?> </ strong >
                            [ <?php  echo  $ post [ 'nome' ] ?> ]
                            < span  class =" badge badge-dark " > <?php  echo  $ data ?> </ span >
                        </a> _ _
                        <?php  endforeach ; ?>
                    </ div >
                </ div >
    </ div >
            </ div >
            < classe div  =" linha " >
                < div  class =" col-md-12 " >
                    <!--Rodapé //-->
                    <?php
                        include  'inclui/rodape.php' ;
                    ?>
                </ div >
            </ div >
        </ div >
        < script  src =" lib/bootstrap-4.2.1-dist/js/bootstrap.min.js " > </ script >
    </ corpo >
</ html >
