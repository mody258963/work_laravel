<!-- resources/views/albums/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Album Manager</h1>

    <div class="mt-4">
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Album Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Album</button>
        </form>
    </div>

    <div class="mt-5">
        @foreach ($albums as $album)
            <div class="card mb-3">
                <div class="card-header">
                    <h5>{{ $album->name }}</h5>
                    <form action="{{ route('albums.destroy', $album) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete Album</button>
                    </form>
                </div>
                <div class="card-body">
                    <form action="{{ route('albums.addPicture', $album) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Picture Name" required>
                        </div>
                        <button type="submit" class="btn btn-secondary">Add Picture</button>
                    </form>
                    
                    @if ($album->pictures->isNotEmpty())
                        <h6 class="mt-3">Pictures</h6>
                        <ul class="list-group">
                            @foreach ($album->pictures as $picture)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $picture->name }}
                                    <form action="{{ route('pictures.destroy', $picture) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete Picture</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
