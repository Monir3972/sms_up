$(document).ready(function() {
       $.ajax({
          url: "api/api.php", //the page containing php script
          type: "post", //request type,
          data: {
                'req': '1',
                'param': '1',
              },
        dataType: "json",
        success: function(result) {
        $("#dept").html(result);
        }
        });

        $.ajax({
               url: "api/api.php", //the page containing php script
               type: "post", //request type,
               data: {
                  'req': '2',
                  'param': '2',
                  'get': 'name'
               },
               dataType: "json",
               success: function(result) {
                  $("#section").html(result);
               }
        });

          $.ajax({
          url:"api/api.php", //the page containing php script
          type: "POST", //request type,
          data: {'req': '1', 'param':'4'},
          dataType:"json",
          success:function(result)
          { 
            $("#student_data").html(result);
          }
          });

         $('#dept').on('change', function() {
         var dept = $(this).val();
         $.ajax({
            type: 'POST',
            url: 'api/api.php',
            data: {
               'req': '2',
               'param': '3',
               'filter': 'dept_id = ' + dept
            },
            dataType: "json",
            success: function(result) {
               $('#section').html(result);
            }
         });

      });


     $('#add_student').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/insert_student.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 alert('Success');
                $.ajax({
                  url:"api/api.php", //the page containing php script
                  type: "POST", //request type,
                  data: {'req': '3', 'param':'4'},
                  dataType:"json",
                  success:function(result)
                  { 
                    $("#student_data").html(result);
                  }
                  });
             }
         });
         $("#add_student")[0].reset();
        
     });

       $("#stud_table").on('click', '#view_id',function(e)
      {
         var sid = $(this).attr('data-id');
         // alert(sid);
         $("#stud_id").val(sid);
         $("#viewSinglemodal").modal('show');
      });

      $("#viewSinglemodal").on('show.bs.modal', function(event)
      {  
         var vid = $("#stud_id").val();
         // alert(vid);
         $.ajax({
            url:"api/api.php",
            type: "POST",
            data: {'req': '3', 'param': '5', 'data': 'id = '+vid},
            dataType:"json",
            success:function(result)
            { 
              $("#modal_det").html(result);
            }
         });
      });

        $("#stud_table").on('click', '#edit_id',function(e)
      {
         var eid = $(this).attr('data-id');
         $("#fetch_edit_id").val(eid);
         $("#editModal").modal('show');
      });

         $("#editModal").on('show.bs.modal', function(event)
      {  
         var edit = $("#fetch_edit_id").val();
         $.ajax({
            url:"api/api.php",
            type: "POST",
            data: {'req': '3', 'param': '6', 'data': 'id = '+edit},
            dataType:"json",
            success:function(result)
            { 
              var dval = result[0];
              // alert(result['name']);
              $("#fetch_edit_id").val(edit);
              $("#edit_name").val(dval['name']);
              $("#edit_email").val(dval['email']);
              $("#edit_contact").val(dval['contact']);
            }
         });
      });

         //update data to database

     $('#form_Edit_data').submit(function (event)
     {
         event.preventDefault();
         $.ajax({
             data: $('form').serialize(),
             url:"controller/update_student.php", //php page URL where we post this data to save in database
             type: 'POST',
             success: function (result) {
                 // alert('Success');
                 $.ajax({
                    url:"api/api.php", //the page containing php script
                    type: "POST", //request type,
                    data: {'req': '1', 'param':'4' },
                    dataType:"json",
                    success:function(result)
                    { 
                       $("#student_data").html(result);
                     
                    $('#editModal').modal('hide');
                    }
                 });
             }
         }); 
     });

          // Delete Data 

     $("#stud_table").on('click', '#delete_id',function(e)
      {
         var eid = $(this).attr('data-id');
         event.preventDefault();


           Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {

                    $.ajax({
                        url:"controller/delete_student.php",
                        type: "POST",
                        data: {'data': eid},
                        success:function()
                        { 
                            $.ajax({
                            url:"api/api.php", //the page containing php script
                            type: "POST", //request type,
                            data: {'req': '1', 'param':'4'},
                            dataType:"json",
                            success:function(result)
                            { 
                               $("#student_data").html(result);
                            }
                         });
                        }
                     });
                        Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                            )
                    }
              })
      });
 
    });


