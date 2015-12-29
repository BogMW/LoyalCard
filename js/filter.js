$(document).ready (function (){


    $('.form-inputs').on('change', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'filter.php',
            data: {
                "search-series": $("#search-series").val(),
                "search-number": $("#search-number").val(),
                "search-startDate": $("#search-startDate").val(),
                "search-endDate": $("#search-endDate").val(),
                "search-status": $("#search-status").val()
            },
            success: function (data) {
                $('.table-rows, .search-error').remove();
                if (data == '') {
                    $('table').after('<p class="search-error">Nothing found!</p>');
                } else {
                    $('table').append(data);
                }
            }
        })
    })

    $('.select-all').on('change', function () {
        if ($(this).prop('checked')) {
            $('.checked').prop('checked', true);
        }
        else {
            $('.checked').prop('checked', false);
        }
    })


    $('.buttons button').on('click', function () {
        var checkboxes = new Array;
        $('.select-all').prop('checked', false);

        $('.checked').each(function () {
            if ($(this).prop('checked')) {
                checkboxes.push($(this).val());
            }
        })

        $.ajax({
            type: 'POST',
            url: 'activate.php',
            data: {
                "number": checkboxes,
                "button": $(this).val()
            },
            success: function (data) {
                if (data != '') {
                    $('.table-rows, .search-error').remove();
                    $('table').append(data);
                } else {
                    $('.table-rows, .search-error').remove();
                    $('table').after('<p class="search-error">All cards deleted!</p>');
                }
            }
        })
    });


    $('.records-count').on('change', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'paginator.php',
            data: {
                "records-count": $("#records-count").val()
            },
            success: function (data) {
                $('.table-rows, .search-error').remove();
                if (data == '') {
                    $('table').after('<p class="search-error">Nothing found!</p>');
                } else {
                    $('table').append(data);
                }
            }
        })
    });

});

