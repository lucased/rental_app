$("a[data-toggle=modal]").click(function() {
    var item_id = $(this).attr('id');

    $.ajax({
        type: 'get',
        url: 'index.php?action=edit',
        data: 'id=' + item_id,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            console.log(data.pName);
            $('.modal-body #name').val(data.pName);
            $('.modal-body #description').val(data.description);
            $('.modal-body #category').val(data.category);
            $('.modal-body #stock').val(data.stock);
            $('.modal-body #asset_number').val(data.asset_number);
            $('.modal-body #week').val(data.week_price);
            $('.modal-body #month').val(data.month_price);
            $('.modal-body #three_month').val(data.three_month_price);
            $('.modal-body #item-id').val(data.id);
        },

        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }

    });

});

// List JS config & init

var options = {
    valueNames: ['id', 'name', 'category', 'stock', 'weekprice']
};

var itemList = new List('items', options);
