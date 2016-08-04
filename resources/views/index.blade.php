<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>Popular PHP Repositories on Github</h1>

        <button id="update-button">Populate/Update List Via Github API</button>

        @if (count($repositories) == 0)
            <p>The database is empty.  Click the button to populate it.</p>
        @else
            <ol>
                @foreach($repositories as $repository)
                         <li>
                            <div><a href='#' class='repo-link' data-repo-id='{{ $repository->id }}'>{{ $repository->name }}</a><div>
                            <table class='repo-details' data-repo-id='{{ $repository->id }}'>
                                <tr>
                                    <th>ID:</th>
                                    <td>{{ $repository->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $repository->name }}</td>
                                </tr>
                                <tr>
                                    <th>URL:</th>
                                    <td><a href="{{ $repository->url }}">{{ $repository->url }}</a></td>
                                </tr>
                                <tr>
                                    <th>Date Created:</th>
                                    <td>{{ $repository->created_date }}</td>
                                </tr>
                                <tr>
                                    <th>Last Push Date:</th>
                                    <td>{{ $repository->last_push_date }}</td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $repository->description }}</td>
                                </tr>
                                <tr>
                                    <th>Star Count:</th>
                                    <td>{{ $repository->star_count }}</td>
                                </tr>
                            </table     
                         </li>
                @endforeach        
            </ol>            
        @endif 

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
