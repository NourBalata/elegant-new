$(document).ready(function() {

    $(document).on('change', '#item_id', function (e) {
        e.preventDefault();
        var select = document.getElementById('item_id');
        var value = select.options[select.selectedIndex].value;
        var conceptName = $('#item_id').find(":selected").val();

        // var url=$('#url_item').val();

        if (value){

            var conceptName = $('#item_id').find(":selected").val();

            if (conceptName != ''){
                if ( $('#client_id').val() !='') {

                    $('#btn_add_item').show();
                }else {
                    alert('يرجى اختيار اسم العميل اولاً');
                    $("#client_id").focus();
                    $('.item_select').val('');
                    var selectize2 = select_serlize[0].selectize;
                    selectize2.clear();

                    return false;
                }

            }else {
                $('#btn_add_item').hide();
            }




        }else {

            $('#btn_add_item').hide();



        }


        return false;
    });
    //


// change invoice type
    $(document).on('change','#invoice_type' ,function(){
        var invoice_type =   $('#invoice_type').find(":selected").val();

        if (invoice_type ==0 || invoice_type == ''){
            $('#div_due_date').show();
            $('#div_due_date_resutl').show();

            document.getElementById("due_date_resutl").value = '';


        }else {
            $('#div_due_date').hide();
            $("#due_date").val('');
            $('#div_due_date_resutl').hide();

            var date = new Date();
            var year = date.getFullYear()
            var month = date.getMonth() + 1
            var day = date.getDate()
            var date2 = new Date(year, month, day);
            document.getElementById("due_date_resutl").value = date2.getDate() +'/'+ date2.getMonth() +'/'+date2.getFullYear();


        }

    });
// check balance & credit_limit
//     $('#total_vat_all').on('onkeypress', function(){

    function check_balance(){

        var total_vat_all = $('#total_vat_all').text();
        var url=$('#url_client2').val();

        $.ajax({

            type:"GET",
            url: url,
            success: function (data) {

                if (total_vat_all  > data.credit_limit){

                    alert('لقد تجاوزت الحد الائتماني للشراء');
                }

                console.log(total_vat_all);


            }



            // });


        });

    }
// get data not submit


    $('#submit').on('click', function() {
        if( $(".quantity").val() == 0){     //this code doesn't work

            alert('The value of the quantity must be greater than zero  > 0');
            $(".quantity").focus()
            return false;
        }
    });




});


