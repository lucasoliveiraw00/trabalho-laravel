<!-- master.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog WebDevAlfa</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--CSS Person-->
    <link rel="stylesheet" href="css/webdevalfa.css">

    <!--CSS Person-->
    <link rel="stylesheet" href="css/webdevalfa-reset.css">

    <!--CSS Person-->
    <link rel="stylesheet" href="css/webdevalfa-responsive.css">

    <!--Favicon-->
    <link rel="icon" type="image/png" href="imgs/favicon.png">
</head>
<body>

<header class="top">
    <div class="container">
        <div class="logo col-md-6">
            <a href="?pg=home">
                <img src="imgs/logo-webdevalfa.png" alt="WebDevAlfa" class="logo">
            </a>
        </div>

        <div class="form col-md-6">
            <form class="form form-search form-inline">
                <input type="text" value="{{$_GET['pesquisar'] ?? ""}}" name="pesquisar" placeholder="Pesquisar?" class="form-control">

                <button>
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
        </div>
    </div><!--End Container-->
</header><!--End Header TOP-->


<div class="menu">
    <div class="container container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Categorias <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($itemsCategorias->all() as $item)
                            <li><a href="?pg={{$item->id}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="empresa">Empresa</a></li>
                <li><a href="contato">Contato</a></li>

            </ul>

        </div><!--/.nav-collapse -->
    </div>
</div><!--End Menu-->


<div class="container">

    @yield('conteudo')


</div><!--End Container-->


<footer class="footer">
    <p class="footer">Todos os direitos reservados - WebDevAlfa <?=date('Y')?></p>
</footer>


<!--jQuery-->
<script src="js/jquery-3.1.1.min.js"></script>

<!--Bootstrap .js-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
