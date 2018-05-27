function loadCity(select)
{
    var subcategorySelect = $('select[name="subcategory"]');

    // послыаем AJAX запрос, который вернёт список подкатегорий для выбранной категории
    $.getJSON('/task/create', {action:'getSubcategory', category:select.value}, function(subcategoryList){
        subcategorySelect.html(''); // очищаем список подкатегорий

        // заполняем список подкатегорий новыми пришедшими данными
        $.each(subcategoryList, function(){
            subcategorySelect.append('<option value="' + this + '">' + this + '</option>');
        });
    });
}