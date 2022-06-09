$(document).ready(function(){
$('.search-prop').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        
        fields: {
            state: {
                validators: {
                    notEmpty: {
                        message: '* Select State'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: '* Select city'
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: '* Select property type'
                    }
                }
            },
            room: {
                validators: {
                    notEmpty: {
                        message: '* Select bedrooms'
                    }
                }
            },
            bathroom: {
                validators: {
                    notEmpty: {
                        message: '* Select bathrooms'
                    }
                }
            }
        }
    });
});