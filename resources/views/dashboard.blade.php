@extends('layouts.app')

@section('content')
        <h1 class="page-header">Dashboard</h1>

        <div class="row placeholders">
            @for ($i = 1; $i < 5; $i++)
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                        width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                    <h4>Etiqueta {{ $i }}</h4>
                    <span class="text-muted">Something else {{ $i }}</span>
                </div>
            @endfor
        </div>

        
        <h2 class="sub-header">Section title</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i < 5; $i++) 
                        <tr>
                            <td>{{ $i }}</td>
                            @for ($x = 1; $x < 5; $x++)
                                <td>Header {{ $x }} - {{ $i }}</td>
                            @endfor
                        </tr>
                        @endfor

                        <tr>
                            <td>1,001</td>
                            <td>Lorem</td>
                            <td>ipsum</td>
                            <td>dolor</td>
                            <td>sit</td>
                        </tr>

                </tbody>
            </table>
        </div>
@endsection