<!DOCTYPE html>
<html>

<head>
    <title>Crud Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <h1 style="text-align: center;padding:20px" ;><b>Crud Application</b></h1>
    <div style="padding:30px" ;></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        New Registration
                    </div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">Registration</a>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('store')}}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email:</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label">Phone:</label>
                                            <input type="text" class="form-control" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-form-label">Country:</label>
                                            <input type="text" class="form-control" name="country">
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-form-label">Address:</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        All Candidate
                    </div>
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">country</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $serial =1;
                                @endphp
                                @foreach($datas as $data)
                                <tr>
                                    <th scope="row">{{$serial ++}}</th>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->country}}</td>
                                    <td>{{$data->address}}</td>
                                    <td><a class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModaledit{{$data->id}}">Edit</a> </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaledit{{$data->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{route('update',$data->id)}}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Name:</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{$data->name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Email:</label>
                                                            <input type="text" name="email" class="form-control"
                                                                value="{{$data->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Phone:</label>
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{$data->phone}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Country:</label>
                                                            <input type="text" name="country" class="form-control"
                                                                value="{{$data->country}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="message-text"
                                                                class="col-form-label">Address:</label>
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{$data->address}}">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-success">Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <td>

                                        <a class="btn btn-danger btn-s" data-toggle="modal"
                                            data-target="#mahedy{{$data->id}}">Delete</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="#mahedy{{$data->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure for
                                                            the delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('delete',$data->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>