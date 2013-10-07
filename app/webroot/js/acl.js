$(document).ready(function () {        
    initAcoTree();    
});

$(document).on('click', 'span.action-item', function () {        
    $.ajax({
        url: '/permissions/show_aro',
        data: 'aco=' + $(this).parent().attr('id'),
        type: 'post',
        success: function (response) {
            $('#aro-display').html(response)
        }
    });
});

function updatePermission(obj, role_id, aco) {
    var perm_url = '/permissions/delete';
    var update_img = '/img/deny.png';    
    
    if($(obj).children('img').attr('src') == '/img/deny.png') {
        perm_url = '/permissions/add';
        update_img = '/img/approve.png';
    }

    $(obj).children('img').attr('src', '/img/ajax-loader.gif');

    $.ajax({
        url: perm_url,
        data: 'role_id=' + role_id + '&aco=' + aco,
        type: 'post',
        success: function (response) {
            $(obj).find('img').attr('src', update_img);
        }
    });
}

function initAcoTree() {
    $("#acos").treeview({
        url: "/permissions/show_aco_tree",
        // add some additional, dynamic data and request with POST
        ajax: {
            data: {
                "additional": function() {
                    return "random: " + new Date;
                }
            },
            type: "post"
        }
    });   
}