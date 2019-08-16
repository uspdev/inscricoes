<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    @section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-usp-theme/css/style.css')}}">
    @show

    @section('javascripts_head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @show
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="logo-imagem" href="/"></a>
                <a class="logo-texto" href="/"></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="logo-faixa">
                    <div Class="d-flex justify-content-end">

                        @auth
                            {{ Auth::user()->name }} - {{ Auth::user()->email }} |
                            @if ( $logout_method == 'POST' )
                                <form action="{{ $logout_url }}" method="POST" class="form-inline" 
                                    style="display:inline-block" id="logout_form">
                                    {{ csrf_field() }}
                                    <!-- O uso do link ao invés do botao é para poder formatar corretamente -->
                                    <a onclick="document.getElementById('logout_form').submit(); return false;"
                                        class="font-weight-bold text-white nounderline pr-2 pl-2" href>Sair</a>
                                </form>
                            @else
                                <a class="font-weight-bold text-white nounderline pr-2 pl-2" href="{{ $logout_url }}">Sair</a>
                            @endif
                        @else
                            Não autenticado |
                            <a class="font-weight-bold text-white nounderline pr-2 pl-2" href="{{ $login_url }}">Entrar</a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('laravel-usp-theme::partials.menu')
            </div>
        </div>

        <div class="row">
            <div id="content" class="container">
                @section('content')
                O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o
                texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um
                texto para criar um espécime de livro. Este texto não só sobreviveu 5 séculos, mas também o salto para a
                tipografia electrónica, mantendo-se essencialmente inalterada. Foi popularizada nos anos 60 com a
                disponibilização das folhas de Letraset, que continham passagens com Lorem Ipsum, e mais recentemente
                com os programas de publicação como o Aldus PageMaker que incluem versões do Lorem Ipsum. Porque é que o
                usamos? É um facto estabelecido de que um leitor é distraído pelo conteúdo legível de uma página quando
                analisa a sua mancha gráfica. Logo, o uso de Lorem Ipsum leva a uma distribuição mais ou menos normal de
                letras, ao contrário do uso de "Conteúdo aqui, conteúdo aqui", tornando-o texto legível. Muitas
                ferramentas de publicação electrónica e editores de páginas web usam actualmente o Lorem Ipsum como o
                modelo de texto usado por omissão, e uma pesquisa por "lorem ipsum" irá encontrar muitos websites ainda
                na sua infância. Várias versões têm evoluído ao longo dos anos, por vezes por acidente, por vezes
                propositadamente (como no caso do humor). De onde é que ele vem? Ao contrário da crença popular, o Lorem
                Ipsum não é simplesmente texto aleatório. Tem raízes numa peça de literatura clássica em Latim, de 45
                AC, tornando-o com mais de 2000 anos. Richard McClintock, um professor de Latim no Colégio
                Hampden-Sydney, na Virgínia, procurou uma das palavras em Latim mais obscuras (consectetur) numa
                passagem Lorem Ipsum, e atravessando as cidades do mundo na literatura clássica, descobriu a sua origem.
                Lorem Ipsum vem das secções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e
                do Mal), por Cícero, escrito a 45AC. Este livro é um tratado na teoria da ética, muito popular durante a
                Renascença. A primeira linha de Lorem Ipsum, "Lorem ipsum dolor sit amet..." aparece de uma linha na
                secção 1.10.32.
                @show
            </div>
        </div>

        @include('laravel-usp-theme::partials.footer')

        @section('javascripts_bottom')
        <script type="text/javascript" src="{{ asset('/vendor/laravel-usp-theme/js/script.js') }}"></script>
        <!-- Datepicker -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
        $(function () {
            //Datepicker
            $('.datepicker').datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        });
        </script>   
        <!-- Datepicker --> 
        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(function () {
            //DataTables
            $('.dataTable').DataTable({
                language    	: {
                    url         : 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
                },  
                paging      	: true,
                lengthChange	: true,
                searching   	: true,
                ordering    	: true,
                info        	: true,
                autoWidth   	: true,
                lengthMenu		: [
					[ 10, 25, 50, 100, -1 ],
					[ '10 linhas', '25 linhas', '50 linhas', '100 linhas', 'Mostar todos' ]
    			],
				pageLength  	: -1
            });
        });
        </script>
        <!-- DataTables -->
        @show

</body>

</html>