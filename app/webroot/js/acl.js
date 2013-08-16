$(document).ready(function () {
    initAcoTree();
});

function initAcoTree() {
    $("#aco").treeview({
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