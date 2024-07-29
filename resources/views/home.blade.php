<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .greeting {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="user-info">
            @if(Auth::check())
                <div class="greeting">Hallo user</div>
                Logged in as: {{ Auth::user()->email }}
            @endif
        </div>

        <div class="header">
            <h1>Labels</h1>
            <a href="{{ route('labels.create') }}" class="btn btn-primary">Add Label</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Customer Type -->
        <div class="form-container mb-4">
            <h2>Customer Type</h2>
            <form>
                <div class="form-group">
                    <label for="customer_type1">Customer Type 1:</label>
                    <input type="text" id="customer_type1" name="customer_type1" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="customer_type2">Customer Type 2:</label>
                    <input type="text" id="customer_type2" name="customer_type2" class="form-control" />
                </div>
            </form>
        </div>

        <!-- Form Goals -->
        <div class="form-container mb-4">
            <h2>Goals</h2>
            <form>
                <div class="form-group">
                    <label for="goal1">Goal 1:</label>
                    <input type="text" id="goal1" name="goal1" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="goal2">Goal 2:</label>
                    <input type="text" id="goal2" name="goal2" class="form-control" />
                </div>
            </form>
        </div>

        {{-- <!-- List of Labels -->
        <div class="card">
            <div class="card-header">
                <h2>Existing Labels</h2>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($labels as $label)
                    <li class="list-group-item">{{ $label->name }}</li>
                @endforeach
            </ul>
        </div> --}}
    </div>
</body>

</html>
