<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

   

    <title>Document</title>
</head>
<body>




    <div class="container mt-5">
        <h1>Data Table</h1>
<div class="d-flex justify-content-end mb-4">
        <button class="btn btn-success "> <a href="{{route('export.file')}}" class="text-white text-decoration-none">Export</a></button>
 


        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mx-4" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
   import
  
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('file.import')}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="file" name="file">

           
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Import File</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    </div>
        
        <!-- Success message -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Table starts here -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>IFSC Code</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->acc_no }}</td>
                        <td>{{ $item->ifsc_code }}</td>
                        <td class="bg-success text-white">{{ $item->status }} </td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Optional JS for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

   


    
</body>
</html>