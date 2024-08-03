jQuery(function($) {
    $('.acceuil__card-competence').click(function() {
        if (!$('.acceuil__info-contact').hasClass('display')) {
            $('.acceuil__info-contact').toggleClass('display');
            $('.acceuil__info-competence').toggleClass('display');
        } else {
            $('.acceuil__info-competence').toggleClass('display');
        }
    });

    $('.acceuil__card-contact').click(function() {
        if (!$('.acceuil__info-competence').hasClass('display')) {
            $('.acceuil__info-competence').toggleClass('display');
            $('.acceuil__info-contact').toggleClass('display');
        } else {
            $('.acceuil__info-contact').toggleClass('display');
        }
    });
});