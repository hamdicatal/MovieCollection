<div class="card-group">
        <div class="card bg-default">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="director">Director:</label>
                    <input type="text" name="director" class="form-control" value="{{ old('director') }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="year">Release Year:</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year') }}" min="1900" max="2099" step="1" />
                </div>
                <div class="form-group">
                    <label for="genre_id">Genre:</label>
                    <select class="form-control" name="genre_id" id="genre_id">
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>
        <div class="card bg-default">
            <div class="card-body">
                <div class="form-group">
                    <label for="casts">Cast:</label>
                    <input type="text" class="form-control mb-2" id="inputCast" onkeyup="searchCast()" placeholder="Search for names..">

                    <ul class="nav list-group" id="allCasts">
                        @foreach ($casts as $cast)
                        <li class="list-group-item" value="{{ $cast->id }}">{{ $cast->name }}</li>
                        @endforeach
                    </ul>

                    <div id="addedCast">

                    </div>

                </div>
                <hr>
                <div class="form-group">
                    <label for="language">Language Options:</label>
                    <div>
                        @foreach ($langs as $lang)
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="{{ $lang->id }}">{{ $lang->name }}</label>                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="poster">Movie Poster:</label>
                    <input type="file" id="poster" name="poster" class="form-control" accept="image/*" onchange="previewPoster(event)">
                    <br>
                </div>
                <img src="{{ URL::asset('posters/default.jpeg') }}" id="img-thumbnail" class="img-thumbnail" width="150px">

            </div>
        </div>
    </div>

    @csrf
