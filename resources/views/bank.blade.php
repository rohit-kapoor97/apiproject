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
        <h1>Data Entry Form</h1>
        <!-- Form starts here -->
        <form action="{{ route('data.store') }}" method="post">
            @csrf <!-- CSRF protection -->

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name"
                    required>
                <span>
                    @error('name')
                        <div class="alert alert-info mt-1 text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="account_no" class="form-label">Account Number</label>
                <input type="text" id="account_no" name="account_no" class="form-control"
                    placeholder="Enter your account number" required>
                <span>
                    @error('account_no')
                        <div class="alert alert-info mt-1 text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="ifsc_code" class="form-label">IFSC Code</label>
                <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="Enter IFSC Code"
                    required>
                <span>
                    @error('ifsc_code')
                        <div class="alert alert-info mt-1 text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </span>
            </div>

            <input type="hidden" name="status" value="unverified">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JS for Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>
