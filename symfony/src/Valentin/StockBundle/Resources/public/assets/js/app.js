$( document ).ready(function() {

    // Collection Form add/remove
    var collectionCount;
    $(document).on('click', '.collection-add', function (e) {
        e.preventDefault();
        var $collectionContainer = $('#' + $(this).data('collection'));
        if(!collectionCount){collectionCount = $collectionContainer.children().not('a').length;}
        var prototype = $collectionContainer.attr('data-prototype');
        var item = prototype.replace(/__name__/g, collectionCount);
        var rmBtn = '<a href="#" class="collection-remove pull-right">Supprimer</a>';
        var wrapper = '<div class="well">'+ rmBtn + item +'</div>';
        $collectionContainer.append(wrapper);
        collectionCount++;
    });
    $(document).on("click", ".collection-remove", function(e) {
        e.preventDefault();
        $(this).parent().remove();
        //collectionCount--;
    });
});
