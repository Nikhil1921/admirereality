$(document).ready(function(){
    $('#loginForm').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile is required'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The Mobile must be 10 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Mobile can only consist of number'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The Password can only consist of alphabetical, number and underscore'
                    }
                }
            }
        }
    });

	$('#signup_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile is required'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The Mobile must be 10 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Mobile can only consist of numbers'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required'
                    },
                    emailAddress: {
                        message: 'The Email Address is not valid'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_@0-9.]+$/,
                        message: 'The Email Address is not valid'
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_ ]+$/,
                        message: 'The Name is not valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The Password can only consist of alphabetical, number and underscore'
                    }
                }
            },
            c_password: {
                validators: {
                    notEmpty: {
                        message: 'The Confirm Password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The Password and confirm password must be same'
                    }
                }
            },
            role: {
                validators: {
                    notEmpty: {
                        message: 'The Role is required'
                    }
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'The User Image is required'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg,image/jpg',
                        maxSize: 2048 * 1024,
                        message: 'The selected User Image is not valid'
                    }
                }
            }
        }
    });

    $('#otp_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            otp: {
                validators: {
                    notEmpty: {
                        message: 'The OTP is required'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'The OTP must be 4 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The OTP can only consist of numbers'
                    }
                }
            }
        }
    });

    $('#forgot-form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required'
                    },
                    emailAddress: {
                        message: 'The Email Address is not valid'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_@0-9.]+$/,
                        message: 'The Email Address is not valid'
                    }
                }
            }
        }
    });

    $('#operation_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            type: {
                validators: {
                    notEmpty: {
                        message: 'The Operation is required'
                    }
                }
            }
        }
    });

    $('#menu_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            menu: {
                validators: {
                    notEmpty: {
                        message: 'The Menu Name is required'
                    }
                }
            }
        }
    });

    $('#feature_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            feature: {
                validators: {
                    notEmpty: {
                        message: 'The Feature Name is required'
                    }
                }
            }
        }
    });

    $('#sub_menu_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid',
            invalid: 'fa fa-close invalid',
            validating: 'fa fa-spinner'
        },
        fields: {
            menu_id: {
                validators: {
                    notEmpty: {
                        message: 'The Menu Name is required'
                    }
                }
            },
            sub_menu: {
                validators: {
                    notEmpty: {
                        message: 'The Sub Menu Name is required'
                    }
                }
            },
            url: {
                validators: {
                    notEmpty: {
                        message: 'The Sub Menu Url is required'
                    }
                }
            },
            icon: {
                validators: {
                    notEmpty: {
                        message: 'The Menu Icon is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z-]+$/,
                        message: 'The Menu Icon can only consist of characters'
                    }
                }
            },
            'permissions[]': {
                validators: {
                    choice: {
                        min: 1,
                        message: 'Please choose atleast one permission'
                    }
                }
            }
        }
    });

    $('#property_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid_prop',
            invalid: 'fa fa-close invalid_prop',
            validating: 'fa fa-spinner'
        },
        fields: {
            plan_image: {
                validators: {
                    notEmpty: {
                        message: 'The Plan Image is required'
                    },
                    file: {
                        extension: 'jpeg,jpg',
                        type: 'image/jpeg,image/jpg',
                        maxSize: 2048 * 1024,
                        message: 'The selected Image is not valid'
                    }
                }
            },
            'features[]': {
                validators: {
                    choice: {
                        min: 1,
                        message: 'Please choose atleast one feature'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required'
                    }
                }
            },
            price: {
                validators: {
                    notEmpty: {
                        message: 'The Price is required'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'The Price can only consist of numbers'
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: 'The Property Type is required'
                    }
                }
            },
            room: {
                validators: {
                    notEmpty: {
                        message: 'The Property room is required'
                    }
                }
            },
            garage: {
                validators: {
                    notEmpty: {
                        message: 'The Property garage is required'
                    }
                }
            },
            parking: {
                validators: {
                    notEmpty: {
                        message: 'The Property parking is required'
                    }
                }
            },
            bathroom: {
                validators: {
                    notEmpty: {
                        message: 'The Property bathroom is required'
                    }
                }
            },
            area: {
                validators: {
                    notEmpty: {
                        message: 'The super buildup area is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The super buildup area can only consist of numbers'
                    }
                }
            },
            c_area: {
                validators: {
                    notEmpty: {
                        message: 'The carpet area is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The carpet area can only consist of numbers'
                    }
                }
            },
            b_area: {
                validators: {
                    notEmpty: {
                        message: 'The buildup area is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The buildup area can only consist of numbers'
                    }
                }
            },
            pincode: {
                validators: {
                    notEmpty: {
                        message: 'The Property pincode is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 6,
                        message: 'The pincode can only consist of six numbers'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The pincode can only consist of numbers'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The Property address is required'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'The Property State is required'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The Property city is required'
                    }
                }
            },
            details: {
                validators: {
                    notEmpty: {
                        message: 'The Detailed Information is required'
                    }
                }
            }
        }
    });
    
    var url = window.location.href;
    if (url.indexOf('update?id=') != -1) {
        var form = $("#property_form").attr("action");
        var str2 = "/update";
        if(form.indexOf(str2) != -1){
            $('#property_form').bootstrapValidator('enableFieldValidators','plan_image', false, 'notEmpty');
        }
    }

    var url = window.location.href;
    if (url.indexOf('/user/update/') != -1) {
        var form = $("#signup_form").attr("action");
        var str2 = "/user/update/";
        if(form.indexOf(str2) != -1){
            $('#signup_form').bootstrapValidator('enableFieldValidators','image', false, 'notEmpty');
            $('#signup_form').bootstrapValidator('enableFieldValidators','password', false, 'notEmpty');
            $('#signup_form').bootstrapValidator('enableFieldValidators','c_password', false, 'notEmpty');
        }
    }

    $('.update_form').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        feedbackIcons: {
            valid: 'fa fa-check valid_prop',
            invalid: 'fa fa-close invalid_prop',
            validating: 'fa fa-spinner'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required'
                    },
                    emailAddress: {
                        message: 'The Email Address is not valid'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_@0-9.]+$/,
                        message: 'The Email Address is not valid'
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_ ]+$/,
                        message: 'The Name is not valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The Password can only consist of alphabetical, number and underscore'
                    }
                }
            },
            c_password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The Password and confirm password must be same'
                    }
                }
            },
        }
    });
});