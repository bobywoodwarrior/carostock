var $collectionHolder;

var $addMaterialLink    = $('<a href="#" class="add_material_link"><i class="glyphicon glyphicon-plus-sign"></i> Add a material</a>');
var $newLinkLi          = $('<li></li>').append($addMaterialLink);

$( document ).ready(function() {

    $collectionHolder = $('ul.materials');

    $collectionHolder.find('li.well').each(function() {
        addMaterialFormDeleteLink($(this));
    });

    $collectionHolder.append($newLinkLi);

    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addMaterialLink.on('click', function(e) {
        e.preventDefault();

        // add a new material form (see next code block)
        addMaterialForm($collectionHolder, $newLinkLi);
    });

    function addMaterialForm($collectionHolder, $newLinkLi) {

        var prototype = $collectionHolder.data('prototype');
        var index = $collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        $collectionHolder.data('index', index + 1);

        var $newFormLi = $('<li class="well"></li>').append(newForm);
        $newLinkLi.before($newFormLi);

        addMaterialFormDeleteLink($newFormLi);
    }

    function addMaterialFormDeleteLink($materialFormLi) {

        var $removeMaterialLink = $('<a href="#" class="remove_material_link pull-right"><i class="glyphicon glyphicon-minus-sign"></i> Remove this material</a>');
        $materialFormLi.append($removeMaterialLink);

        $removeMaterialLink.on('click', function(e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li
            $materialFormLi.remove();
        });
    }

});
