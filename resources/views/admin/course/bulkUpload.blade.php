@extends('layouts.superadmin')

@section('template_title')
   Course Bulk Upload
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }

    </style>

@section('content')

        @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Success',
              '{{ session('success') }}',
              'success'
            )
            </script>
        @endif


        @if (session('error'))
            <script type="text/javascript">
              'Error!',
              '{{ session('error') }}',
              'error'
            )
            </script>
        @endif


<!-- Page Wrapper -->
<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid special-eduCard">
            
              


                <div class="card special-eduCard">



  
            
                    <div class="card-header font-weight-bold">
                      <h3 class="float-left">Bulk Import Edutainment</h3>
                     
                    </div>
                
                    <div class="card-body ">
                
                        <form id="excel-csv-import-form" method="POST"  action="/admin/importExcelCSVEdutainment" accept-charset="utf-8" enctype="multipart/form-data">
                
                          @csrf
                                  
                            
                          <table class="table table-bordered" id="dynamicAddRemove">
                              <tr>
                                  <th>Add Each Video ID</th>
                                  
                              </tr>
                              <tr>
                                  <td><input type="text" name="videoId" placeholder="Enter Video ID One" class="form-control" /><br>
                                       <!-- <input type="text" name="videoIdTwo" placeholder="Enter Video ID Two" class="form-control" /><br>
                                        <input type="text" name="videoIdThree" placeholder="Enter Video ID Three" class="form-control" /><br>
                                      <input type="text" name="videoIdFour" placeholder="Enter Video ID Four" class="form-control" /><br>
                                      <input type="text" name="videoIdFive" placeholder="Enter Video ID Five" class="form-control" /><br>
                                    <input type="text" name="videoIdSix" placeholder="Enter Video ID Six" class="form-control" /><br>
                                    <input type="text" name="videoIdSeven" placeholder="Enter Video ID Seven" class="form-control" /><br>
                                    <input type="text" name="videoIdEight" placeholder="Enter Video ID Eight" class="form-control" /><br>
                                    <input type="text" name="videoIdNine" placeholder="Enter Video ID Nine" class="form-control" /><br>
                                    <input type="text" name="videoIdTen" placeholder="Enter Video ID Ten" class="form-control" /> -->
                                  </td>
                                 
                              </tr>
                          </table>
                          <button type="submit" class="btn btn-info btn-block">Publish</button>


                        </form>
                
                    </div>
            
              </div>
                
 
            </div>
        <!-- /Page Wrapper -->




        


                   <!-- Page Content -->
                   <div class="content container-fluid special-card">
            
              


            <div class="card special-card">
        
                <div class="card-header font-weight-bold">
                  <h3 class="float-left">Bulk Import Academic</h3>
                  
                </div>
            
                <div class="card-body">
            
                    <form id="excel-csv-import-form" method="POST"  action="/admin/importExcelCSVAcademic" accept-charset="utf-8" enctype="multipart/form-data">
            
                      @csrf
                              
                          <table class="table table-bordered" id="dynamicAddRemove">
                              <tr>
                                  <th>Add Each Video ID</th>
                                  
                              </tr>
                              <tr>
                                  <td><input type="text" name="videoId" placeholder="Enter Video ID One" class="form-control" /><br>
                                       <!-- <input type="text" name="videoIdTwo" placeholder="Enter Video ID Two" class="form-control" /><br>
                                        <input type="text" name="videoIdThree" placeholder="Enter Video ID Three" class="form-control" /><br>
                                      <input type="text" name="videoIdFour" placeholder="Enter Video ID Four" class="form-control" /><br>
                                      <input type="text" name="videoIdFive" placeholder="Enter Video ID Five" class="form-control" /><br>
                                    <input type="text" name="videoIdSix" placeholder="Enter Video ID Six" class="form-control" /><br>
                                    <input type="text" name="videoIdSeven" placeholder="Enter Video ID Seven" class="form-control" /><br>
                                    <input type="text" name="videoIdEight" placeholder="Enter Video ID Eight" class="form-control" /><br>
                                    <input type="text" name="videoIdNine" placeholder="Enter Video ID Nine" class="form-control" /><br>
                                    <input type="text" name="videoIdTen" placeholder="Enter Video ID Ten" class="form-control" /> -->
                                  </td>
                                 
                              </tr>
                          </table>
                          <button type="submit" class="btn btn-success btn-block">Publish</button>  
                    </form>
            
                </div>
        
          </div>
            

        </div>
    <!-- /Page Wrapper -->

@endsection