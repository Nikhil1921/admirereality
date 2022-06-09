$(document).ready(function() {

  var url = $("#url").val();
  var table = $('#datatable').DataTable({
      "processing": true,
      "serverSide": true,
      'language': {
          'loadingRecords': '&nbsp;',
          'processing': 'processing..',
          'paginate': {
                      'first': '|',
                      'next': '<i class="fa fa-arrow-circle-right"></i>',
                      'previous': '<i class="fa fa-arrow-circle-left"></i>',
                      'last':'|'
                      }
      },  
      "order":[], 

      "ajax":{  
              url: url+'get',  
              type:"POST",
              data: function ( data ) {
                  data.status = $('#status').val();
              },
         }, 
      "columnDefs":[   
              {  
                  "targets":'target', 
                  "orderable":false,  
              },  
            ],
  });

    $(document).on('change', '.priority', function(){
      $(this).parent('form').submit();
    })

    $("#navigation").on('change', function(){
        var id = $(this).val();
        
        if (id != '') {
            $.ajax({
                url: $('#get-sub-menu').val(),
                method: "POST",
                data: {id:id},
                dataType:"json",
                async: false,
                success:function(result){
                    var checkbox = '';
                     $.each(result, function(i, item) {
                        checkbox += '<div class="col-3"><div class="checkbox checkbox-theme checkbox-circle"><input id="'+item.id+'" type="checkbox" name="navigation['+id+'][]" value="'+item.id+'" class="'+id+'"> <label for="'+item.id+'">'+item.sub_menu.toUpperCase()+'</label></div></div>';
                    });    
                    $("#add-sub-menu").html('<div class="row"> <div class="col-md-10"> <div class="form-group-main"> <label>Sub Menu</label> <div class="form-group"> <div class="row"> '+checkbox+' </div></div></div></div><div class="col-md-1"> <label></label> <button type="button" class="btn btn-md btn-primary add-submenu"><i class="fa fa-plus"></i></button> </div></div>');
                },
            });            
        }else{
            $("#add-sub-menu").html('');
        }
    })

    $(document).on('click','.add-submenu', function(){
        var val = $("#navigation option:selected").html();
        var id = $("#navigation option:selected").val();
        
        var div = '<div class="col-lg-4 col-md-4 col-sm-4"> <div class="form-group-main"> <label for="role"> Menu Name </label> <div class="form-group"> <input type="text" class="input-text form-control" value="'+val+'" disabled=""> </div></div></div><div class="col-lg-8 col-md-8 col-sm-8"> <div class="row"> <div class="col-md-10"> <div class="form-group-main"> <label> Sub Menu </label> <div class="form-group"> <div class="row">';
        $.each($("."+id+":checked"), function(){
            div += '<div class="col-3"> <div class="checkbox checkbox-theme checkbox-circle"> <input id="'+$(this).val()+'" type="checkbox" checked="checked" name="navigation['+id+'][]" value="'+$(this).val()+'"> <label for="'+$(this).val()+'">'+$("label[for='"+this.id+"']").html().toUpperCase()+'</label> </div></div>';
        });
        div += ' </div></div></div></div><div class="col-md-1"> <label> </label> <button type="button" class="btn btn-md btn-danger remove-submenu"> <i class="fa fa-minus "> </i> </button> </div></div></div>';
        $(".remove-nav").append(div);
        $("#navigation option:selected").remove();
        $("#navigation").val('');

        $("#navigation").trigger('change');
    })

     $(document).on('click','.remove-submenu', function(){
        $(this).parent().closest('div.remove-nav').html('');
    })

    $('#image-change').on('change', function(){
        var file = this.files[0];
        var fileType = file["type"];
        var validImageTypes = ["image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
             alert("Select JPG or JPEG Image.");
        }else{
            $('#change-image').submit();    
        }
    });

    $('.state').on('change', function(){
        var id = $(this).val();
        var val = $(this).data("value");
        var dependent = $(this).data('dependent');
        
        if (id == "") {
            $("#"+dependent).html('<option value="">Select City</option>');
        }else{
            var select = $(this).attr('id');
            $.ajax({
                    url: "get-city",
                    method: "POST",
                    async: false,
                    data: {id: id, select:select},
                    success:function(result){
                      $("#"+dependent).html(result);
                      $('#'+dependent).val(val);
                    },
            })
        }    
    })  
    $('.state').trigger('change');

    $(document).on('click','.remove-img',function(e){
        e.preventDefault();
        var href = $(this).data('href');
        var div = $(this).parent('div.remove-image');
        if (confirm("Press a button!")) {
            $.ajax({
              url: href,
              method: "GET",
              async: false,
              success:function(result){
                div.remove();
              },
            });
        }else {
            return false;
        }
    });
    
  toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    if ($('#success-message').val() != undefined) {
        toastr["success"]($('#success-message').val(), "Success")
    }

    if ($('#error-message').val() != undefined) {
        toastr["error"]($('#error-message').val(), "Error")
    }
})