

$(document).on('submit' , '#saveStudent' , function(e){
    e.preventDefault();
    formData = new FormData(this)
    formData.append('save_student' , true)
    // alert('hellow')
    $.ajax({
        type: "POST",
        url: "code.php",
        data:formData,
        processData:false,
        contentType:false,
        success: function (response) {
            // var res = jQuery.parseJSON(response)
            var res = $.parseJSON(response)
                if(res.status == 200)
                {
                    // alert('Student Created Successfully now')
                    $('#modalId').modal('hide')
                    $('#saveStudent')[0].reset()
                    $('#myAlertMsg').html(res.message)
                    $('#myAlertMsg').removeClass('d-none')
                    $('#myAlertMsg').removeClass('alert-danger')
                    $('#myAlertMsg').addClass('alert-success')
                    $('#listOfStudent').load(location.href + " #listOfStudent")
                    setTimeout(()=>{
                    $('#myAlertMsg').addClass('d-none')
                    },3000)
            
                }
                else if(res.status==422){
                    $('#modalId').modal('hide')
                    $('#myAlertMsg').html(res.message);
                    $('#myAlertMsg').removeClass('d-none');
                    $('#myAlertMsg').removeClass('alert-success')
                    $('#myAlertMsg').addClass('alert-danger')
                }
        }
    });

  
})
// =============================================================================================

//            info student


$(document).on('click' , "#infoStudentBtn" , ()=>{
    $('#infoStudentModal').modal('show');
    // formData = new FormData(this)
    // formData.append('student_id' , true)
    var student_id = $(this).val
    $.ajax({
        type: "GET",
        url: "code.php?student_id" + student_id,
        success: function (response) {
            var res = $.parseJSON(response)
            if(res.status == 200){
                alert('student selected')
            }
        }
    });
})





















