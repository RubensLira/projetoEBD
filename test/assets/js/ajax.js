$(document).ready(function () {
    $('#pesquisa').keyup(function () {
        let dados = $('form').serialize() // Serializa os dados do formulário
        $.ajax({
            url: 'assets/php/processo.php',
            type: 'POST',
            dataType: 'html',
            data: dados,
            success: function (data) {
                $('#resultado').html(data)
            }
        })
    })
})
$(document).ready(function () {
    $('#sala').change(function () {
        let dados = $('#form').serialize() // Serializa os dados do formulário
        $.ajax({
            url: '../php/sala.php',
            type: 'POST',
            dataType: 'html',
            data: dados,
            success: function (data) {
                $('#tabela').html(data)
            }
        })
    })
})