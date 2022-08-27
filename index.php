<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card rounded-0">
            <div class="card-body">
               <form action="" method="POST" id="add_student">
                <div class="row g-3">
                  <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name">
                  </div>
                  <div class="col">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="text" placeholder="DOB" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-sm" id="dob" name="dob">
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" name="email" id="email">
                  </div>
                   <div class="col">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="contact" class="form-control form-control-sm" name="contact" id="contact">
                  </div>
                  <div class="col">
                    <label for="address" class="form-label">Address</label>
                      <textarea class="form-control form-control-sm" name="address" id="address" ></textarea>
                  </div>
                </div>
                <div class="row g-3">
                  <div class="col">
                    <label for="dept" class="form-label">Department </label>
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="fa-solid fa-plus"></i>
                      </button>
                    </h2>
                       <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                              <div class="card rounded-0">
                                <div class="card-body">
                                  <div class="row g-3">
                                    <div class="col">
                                    <label for="dept_name" class="form-label">Department</label>
                                    <input type="text" class="form-control form-control-sm" id="dept_name" name="dept_name">
                                    </div>
                                    <div class="col">
                                    <label for="dept_code" class="form-label">Department Code</label>
                                    <input type="text" class="form-control form-control-sm" id="dept_code" name="dept_code">
                                    </div>
                                  </div>
                                </div>
                              </div>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                     <select class="form-select js-example-basic-single form-control-sm" id="dept" name="dept" >
                      
                    </select>
               
                  </div>
                   <div class="col">
                    <label for="section" class="form-label">Section</label>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <i class="fa-solid fa-plus"></i>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                         <div class="card rounded-0">
                                <div class="card-body">
                                  <div class="row g-3">
                                    <div class="col">
                                    <label for="sec_name" class="form-label">Section</label>
                                    <input type="text" class="form-control form-control-sm" id="sec_name" name="sec_name">
                                    </div>
                                    <div class="col">
                                    <label for="sec_code" class="form-label">Section Code</label>
                                    <input type="text" class="form-control form-control-sm" id="sec_code" name="sec_code">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </div>
                      <select class="form-select js-example-basic-single form-control-sm" id="section" name="section" >
                       
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm float-end mt-2">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12">
          <table class="table table-bordered" id="stud_table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Email</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col">Section</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="student_data">
            
          </tbody>
        </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="assets/js/student.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
    </script>
  </body>
</html>

<!-- Button trigger modal -->


<!-- Modal -->



<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" id="form_Edit_data">
        <div class="modal-body">
          <input type="hidden" id="fetch_edit_id" name="fetch_edit_id">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" >
          </div>
           <div class="mb-3">
            <label for="" class="form-label">Email address</label>
            <input type="email" class="form-control" id="edit_email" name="edit_email">
          </div>
           <div class="mb-3">
            <label for="" class="form-label">Contact</label>
            <input type="text" class="form-control" id="edit_contact" name="edit_contact">
          </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="update" class="btn btn-primary">Update</button>
        </div>
       </form>
    </div>
  </div>
</div>


<div class="modal fade" id="viewSinglemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="modal-body">
        <input type="hidden" id="stud_id">
          <div id="modal_det">
         
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>