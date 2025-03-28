<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <div class="main-panel">
        <div class="content-wrapper">
            
            
<div class="card">
    <div class="card-body">

<form action="process_clientdiary.php" method="POST" enctype="multipart/form-data">
    

            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="title" class="form-control" placeholder="Title .. "><br>
                </div>


<div class="col-sm-12">
                    <input type="text" name="sku" class="form-control" placeholder="Sku .. "><br>
                </div>
                
<div class="col-sm-12 dropzone" id="mydropzone">
                      <div class="fallback">
                        <input name="file[]" type="file" multiple />
                      </div>
                    </div>
                    
             
             
<div class="col-sm-12">
                <br>
                    <input type="submit" name="submit" class="btn btn-primary"><br>
                </div>
                       
            </div>
            
            
            
            </form>
            
            
    </div>
</div>

            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>