var $collectionHolder;

var $addMaterialLink    = $('<a href="#" class="add_material_link"><i class="glyphicon glyphicon-plus-sign"></i> Add a material</a>');
var $newLinkLi          = $('<li></li>').append($addMaterialLink);

$( document ).ready(function() {

    /******************************
     GLOBAL SEARCH AUTOCOMPLETE
     *******************************/
    $('#globalsearch').autocomplete({
        triggerSelectOnValidInput: true,
        noCache:true,
        showNoSuggestionNotice: true,
        serviceUrl: site_url + 'admin/search',
        params: {
            entity: $('select[name="entity"]').find('option:selected').val()
        },
        onSelect: function (suggestion) {
            //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });

    $(document).on("change", 'select[name="entity"]', function(e) {
        $('h4.search em').text($(this).find('option:selected').text());
        $('#globalsearch').autocomplete('setOptions', {
            params: {
                entity: $(this).find('option:selected').val()
            }
        });
        $('#globalsearch').autocomplete().onValueChange();
    });


    /******************************
        COLLECTION ADD/REMOVE
    *******************************/

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

    /***********************************
        AJAX CHECK MATERIALS STOCK
     ***********************************/
    $('#form_production .product_model').change(function(){
        ajaxMaterials();
    });

    $('#form_production .sizes input').keyup(function(){
        ajaxMaterials();
    });

    $('#form_production .sizes input').change(function(){
        ajaxMaterials();
    });

    var ajaxMaterials = function() {
        var modelId     = $('#form_production .product_model').val();
        var sizes       = $('.sizes input');
        var totalSizes  = 0;

        $.each(sizes, function( index, value ) {
            totalSizes += Number($(value).val());
        });

        $('.result_ajax .loading').show();
        $('.result_ajax .alert').hide();
        $('#saveProduction').prop('disabled', true);

        $.ajax({
            url: site_url + 'admin/productModel/ajaxCheckMaterials',
            data: {
                modelId     : modelId,
                totalSizes  : totalSizes
            },
            success: function(response){

                $('.result_ajax .loading').hide();

                if (response.status == true) {
                    $('.reponse_ok').show();
                    $('#saveProduction').prop('disabled', false);
                } else {
                    $('.reponse_ko').show();
                }
            }
        });
    }

});
