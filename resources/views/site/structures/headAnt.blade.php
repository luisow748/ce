<?php
//$asset = asset('assets/src/variaveis.php');
//include "$asset";
//$caminho_absoluto = $var['caminho_absoluto'];
//
//?>

<head>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content='Mark Otto, Jacob Thornton, and Bootstrap contributors'>
    <meta name='generator' content='Jekyll v4.1.1'>
    <title> fdsfsdfsdfsdfsdfdf ds fsd fd </title>
    <link rel="porra nenhuma">
    <link rel='shortcut icon' href="{!! $caminho_absoluto !!}icon.ico">
    <link href='{!! $caminho_absoluto !!}assets/dist/css/font_awesome/all.css' rel='stylesheet'> <!--load all styles -->

    <link rel='canonical' href='https://getbootstrap.com/docs/4.5/examples/offcanvas/'>
    <link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
   <!-- <link rel='canonical' href='https://getbootstrap.com/docs/4.5/examples/floating-labels/'> -->
    <!-- Bootstrap core CSS -->

    <link href='{{ $caminho_absoluto }}/assets/dist/css/bootstrap.css' rel='stylesheet'>


    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>

    <link rel='stylesheet' href='{{$caminho_absoluto}}assets/dist/css/items/items.css' >

    <link rel='stylesheet' href='{{$caminho_absoluto}}assets/dist/css/sidebar4/style.css'> <!-- Sidebar 4 -->
    <link rel='stylesheet' href='{{$caminho_absoluto}}offcanvas.css'>


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

        </style>

    <style type="text/css">
        #pesquisaTeste{
            width:500px;
        }
        #form_pesquisa{
            margin-top:50px;
        }
    </style>
    <script type="text/javascript" src='{{$caminho_absoluto}}assets/dist/js/jquery-2.1.0.js'></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //Aqui a ativa a imagem de load
            function loading_show(){
                $('#loading').html("<img src='{{$caminho_absoluto}}img/loading.gif'/>").fadeIn('fast');
            }

            //Aqui desativa a imagem de loading
            function loading_hide(){
                $('#loading').fadeOut('fast');
            }


            // aqui a fun��o ajax que busca os dados em outra pagina do tipo html, n�o � json
            function load_dados(valores, page, div)
            {
                $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    beforeSend: function(){//Chama o loading antes do carregamento
                        loading_show();
                    },
                    data: valores,
                    success: function(msg)
                    {
                        loading_hide();
                        var data = msg;
                        $(div).html(data).fadeIn();
                    }
                });
            }

            //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
            load_dados(null, "{{route('return_category')}}", '#MostraPesq');


            //Aqui uso o evento key up para come�ar a pesquisar, se valor for maior q 0 ele faz a pesquisa
            $('#section').click(function(){

                var valores = $('#cria_item').serialize()//o serialize retorna uma string pronta para ser enviada

                //pegando o valor do campo #pesquisaCliente
                var $parametro = $(this).val();

                if($parametro.length >= 1)
                {
                    load_dados(valores, "{{route('return_category')}}", '#MostraPesq');
                }else
                {
                    load_dados(null, "{{route('return_category')}}", '#MostraPesq');
                }
            });

        });
    </script>


</head>
