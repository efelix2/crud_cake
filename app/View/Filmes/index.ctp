<style>
    tr,
    td {
        border-bottom: none !important;
        background: #FFF;
    }

    div#content,
    td {
        background: #413636 !important;
    }

    .nav-link.active {
        background-color: #47cf36 !important;
    }
</style>

<div class="text-center text-white mb-5">
    <span class="h1 fw-bold">Catálogo de filmes</span>
</div>
<table id="tbl_filmes">
    <tr>
        <?php foreach ($filmes as $filme) : ?>
            <td class="text-center">
                <?php echo $this->Html->image($filme['Filme']['capa'], array('style' => 'height: 350px; width: 250px;', 'alt' => 'Capa do Filme', 'url' => array('controller' => 'filmes', 'action' => 'detalhar', $filme['Filme']['id'], 'Filmes'))); ?> <!-- 2º VALOR ENVIADO SERVIRÁ PARA MOSTRAR À PÁGINA DETALHAR PARA ONDE REDIRECIONAR CASO O BOTÃO RETORNAR SEJA CLICADO -->
            </td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($filmes as $filme) : ?>
            <td class="h4 text-center text-white">
                <?php echo $this->Html->link($filme['Filme']['titulo'], array('controller' => 'filmes', 'action' => 'detalhar', $filme['Filme']['id'], 'Filmes'), array('class' => 'text-white')) ?>
            </td>
        <?php endforeach; ?>
    </tr>
</table>

<script>
    $(document).ready(function() {

        // CRIA PAGINAÇÃO NA TABELA
        $('#tbl_filmes').after('<ul id="nav_tbl" class="d-flex justify-content-center nav nav-pills"> </ul>');
        var filmesExibidos = 4;
        var rowsTotal = $('#tbl_filmes tbody tr:nth-child(1) td').length;
        var numPages = rowsTotal / filmesExibidos;

        for (i = 0; i < numPages; i++) {
            var pageNum = i + 1;
            $('#nav_tbl').append('<li class="nav-item"><a href="#" class="nav-link" aria-current="page" rel="' + i + '">' + pageNum + '</a> </li>');
        }

        $('#tbl_filmes tbody td').hide();
        $('#tbl_filmes tbody tr:nth-child(1) td').slice(0, filmesExibidos).show();
        $('#tbl_filmes tbody tr:nth-child(2) td').slice(0, filmesExibidos).show();
        $('#nav_tbl a:first').addClass('active');
        $('#nav_tbl a').bind('click', function() {

            $('#nav_tbl a').removeClass('active');
            $(this).addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * filmesExibidos;
            var endItem = startItem + filmesExibidos;
            $('#tbl_filmes tbody tr:nth-child(1) td').css('opacity', '0.0').hide().slice(startItem, endItem).
            css('display', 'table-cell').animate({
                opacity: 1
            }, 300);
            $('#tbl_filmes tbody tr:nth-child(2) td').css('opacity', '0.0').hide().slice(startItem, endItem).
            css('display', 'table-cell').animate({
                opacity: 1
            }, 300);
        });
    });
</script>